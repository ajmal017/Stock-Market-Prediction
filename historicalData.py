from yahoo_finance import Share
import sys
import mysql.connector as mc


def runData(stock, cursor, num):
    stock = Share(stock)
    myList = stock.get_historical('2016-01-01', '2017-04-24')
    totalData = []
    for day in myList:
        data = day.values()
        data = data[::-1]
        totalData.append(tuple(data))
    for p in totalData:
        format_str = """INSERT INTO HistoricalData(numb, adj_close, close, day, high, low, open, symbol, volume)
        VALUES ({numb},'{adj_close}', '{close}', '{day}', '{high}', '{low}', '{open}', '{symbol}', '{volume}');"""
        sql_command = format_str.format(numb=num + 1, adj_close=p[0], close=p[1], day=p[2], high=p[3], low=p[4],
                                        open=p[5], symbol=p[6], volume=p[7])
        print(sql_command)
        cursor.execute(sql_command)
        num += 1
    return num


def main():
    # connect with the server
    try:
        connection = mc.connect(host="127.0.0.1", user="root", passwd="", db="SEWA")
    except mc.Error as e:
        print("Error %d: %s" % (e.args[0], e.args[1]))
        sys.exit(1)
    cursor = connection.cursor()
    # delete if the table already exists
    cursor.execute("DROP TABLE IF EXISTS HistoricalData")
    # create table HistoricalData
    sql_command = """
    CREATE TABLE HistoricalData (
    numb INTEGER PRIMARY KEY,
    adj_close REAL,
    close REAL,
    day DATE,
    high REAL,
    low REAL,
    open REAL,
    symbol VARCHAR(10),
    volume INTEGER);"""
    cursor.execute(sql_command)
    # initialize serial number and the ticker symbols
    no = 0
    ticker = ['AAPL', 'AMZN', 'FB', 'GOOG', 'INTC', 'MSFT', 'T', 'TWTR', 'TXN', 'YHOO']
    # call function runData for every symbol
    for symbol in ticker:
        sr_no = runData(symbol, cursor, no)
        connection.commit()
        no = sr_no
    cursor.close()
    connection.close()


if __name__ == '__main__':
    main()
