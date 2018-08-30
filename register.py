import sys
import mysql.connector as mc

try:
    connection = mc.connect(host="127.0.0.1",
                            user="root",
                            passwd="",
                            db="login")
except mc.Error as e:
    print("Error %d: %s" % (e.args[0], e.args[1]))
    sys.exit(1)

cursor = connection.cursor()
cursor.execute("DROP TABLE IF EXISTS register")

sql_command = """
CREATE TABLE register(
email VARCHAR(30),
username VARCHAR(30),
password VARCHAR(30));"""

cursor.execute(sql_command)

connection.commit()
cursor.close()
connection.close()
