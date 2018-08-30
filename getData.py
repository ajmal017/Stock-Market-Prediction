import mysql.connector as mc
import sys


def getRealtimeData(ticker):
    try:
        connection = mc.connect(host="127.0.0.1", user="root", passwd="", db="SEWA")
    except mc.Error as e:
        print("Error %d: %s" % (e.args[0], e.args[1]))
        sys.exit(1)
    cursor = connection.cursor()
    connection.commit()
    cursor.execute("SELECT last_price FROM realtime WHERE symbol='%s' " % ticker)
    train_data = cursor.fetchall()
    cursor.close()
    connection.close()
    lst = []
    for x in train_data:
        lst.append(x[0])
    lst = lst[::-1]
    lst = lst[0:10]
    return lst[::-1]


def getHistoricalData(ticker):
    try:
        connection = mc.connect(host="127.0.0.1", user="root", passwd="", db="SEWA")
    except mc.Error as e:
        print("Error %d: %s" % (e.args[0], e.args[1]))
        sys.exit(1)
    cursor = connection.cursor()
    connection.commit()
    cursor.execute("SELECT adj_close FROM historicaldata WHERE symbol='%s' " % ticker)
    train_data = cursor.fetchall()
    cursor.close()
    connection.close()
    lst = []
    for x in train_data:
        lst.append(x[0])
    lst = lst[0:15]
    return lst[::-1]


def historicalVolume(ticker):
    try:
        connection = mc.connect(host="127.0.0.1", user="root", passwd="", db="SEWA")
    except mc.Error as e:
        print("Error %d: %s" % (e.args[0], e.args[1]))
        sys.exit(1)
    cursor = connection.cursor()
    connection.commit()
    cursor.execute("SELECT adj_close FROM historicaldata WHERE symbol='%s' " % ticker)
    train_data = cursor.fetchall()
    lst = []
    for x in train_data:
        lst.append(x[0])
    cursor.execute("SELECT volume FROM historicaldata WHERE symbol='%s' " % ticker)
    volume = cursor.fetchall()
    vol = []
    for x in volume:
        vol.append(x[0])
    cursor.close()
    connection.close()
    return lst[::-1], vol[::-1]
