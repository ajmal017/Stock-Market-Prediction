import mysql.connector as mc
import sys


def main():
    try:
        connection = mc.connect(host="127.0.0.1", user="root", passwd="", db="SEWA")
    except mc.Error as e:
        print("Error %d: %s" % (e.args[0], e.args[1]))
        sys.exit(1)
    cursor = connection.cursor()
    connection.commit()
    cursor.execute("SELECT max(adj_close) FROM HistoricalData WHERE symbol='YHOO' AND day>DATE(04/18/2017)")
    train_data = cursor.fetchall()
    print round(train_data[0][0], 2)
    cursor.close()
    connection.close()


if __name__ == '__main__':
    main()
