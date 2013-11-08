#!/usr/bin/python

print 'Content-type: text/html\n'

import cgitb; cgitb.enable()

import MySQLdb
conn = _mysql.connect('localhost','root','0818','bar')
curs = conn.cursor()
