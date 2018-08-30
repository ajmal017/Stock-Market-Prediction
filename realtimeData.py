import sys
import mysql.connector as mc
import time
from rtstock.stock import Stock
from googlefinance import getQuotes


def getData(stock):
    myList = getQuotes(stock)
    for x in myList:
        data = x.values()
    data_new = [data[3], data[4], data[6]]
    return tuple(data_new)


def runData(stock, cursor):
    realtime = Stock(stock)
    data = getData(stock)
    format_str = """INSERT INTO realtime (last_price, price_time, symbol)
    VALUES ('{last_price}','{price_time}','{symbol}');"""
    sql_command = format_str.format(last_price=data[0], price_time=data[1], symbol=data[2])
    print (sql_command)
    cursor.execute(sql_command)


def main():
    try:
        connection = mc.connect(host="127.0.0.1", user="root", passwd="", db="SEWA")
    except mc.Error as e:
        print("Error %d: %s" % (e.args[0], e.args[1]))
        sys.exit(1)
    cursor = connection.cursor()
    ticker = ['AAPL', 'AMZN', 'FB', 'GOOG', 'INTC', 'MSFT', 'T', 'TWTR', 'TXN', 'YHOO']
    while 1:
        for x in ticker:
            runData(x, cursor)
            time.sleep(6)
            connection.commit()
        print "\n"
    connection.commit()
    cursor.close()
    connection.close()


if __name__ == '__main__':
    main()
