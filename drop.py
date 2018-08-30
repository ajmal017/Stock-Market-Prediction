import sys
import mysql.connector as mc


def main():
    try:
        connection = mc.connect(host="127.0.0.1", user="root", passwd="", db="SEWA")
    except mc.Error as e:
        print("Error %d: %s" % (e.args[0], e.args[1]))
        sys.exit(1)
    cursor = connection.cursor()
    cursor.execute("DROP TABLE IF EXISTS realtime")
    sql_command = """
        CREATE TABLE realtime (
        last_price REAL,
        price_time TIME,
        symbol VARCHAR(10));"""
    cursor.execute(sql_command)
    connection.commit()
    cursor.close()
    connection.close()


if __name__ == '__main__':
    main()
