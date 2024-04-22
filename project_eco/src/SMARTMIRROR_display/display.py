from distutils.log import error
from PyQt5 import QtCore, QtGui, QtWidgets #pip install pyqt5(pip install python3-pyqt5)
#import datetime 
from datetime import datetime
#from time import sleep
import threading
import tkinter as tk #this can't pip install
import time
import requests
import feedparser
from PyQt5.QtCore import *
from PyQt5.QtCore import Qt
from PyQt5.QtWidgets import *
from PyQt5.QtTest import *
#from PyQt5.QtGui import QPixmap, QImage   
#import threading as Threading

#from _thread import *

import mysql.connector

d = 'news_data'

class Ui_MainWindow(object):
    hello_world = 0
    root = tk.Tk()
    width = root.winfo_screenwidth()
    height = root.winfo_screenheight()
    News_url = "http://fs.jtbc.joins.com//RSS/newsflash.xml"
    start_or_stop=False
    start=True

    def setupUi(self, MainWindow):
        MainWindow.setObjectName("MainWindow")

        palette = QtGui.QPalette()

        brush = QtGui.QBrush(QtGui.QColor(255, 255, 255))
        brush.setStyle(QtCore.Qt.SolidPattern)
        palette.setBrush(QtGui.QPalette.Active, QtGui.QPalette.WindowText, brush)

        brush = QtGui.QBrush(QtGui.QColor(0, 0, 0))
        brush.setStyle(QtCore.Qt.SolidPattern)
        palette.setBrush(QtGui.QPalette.Active, QtGui.QPalette.Window, brush)

        MainWindow.setPalette(palette)
        #MainWindow.resize(800, 600)
        MainWindow.showFullScreen()

        self.centralwidget = QtWidgets.QWidget(MainWindow)
        self.centralwidget.setObjectName("centralwidget")

        self.clock = QtWidgets.QLabel(self.centralwidget)
        self.clock.setGeometry(QtCore.QRect(200,300,100,50))
        self.clock.setObjectName("clock")

        #time 이라는 이름으로 label 생성 [(오전/오후)시/분]
        self.time = QtWidgets.QLabel(self.centralwidget)
        self.time.setGeometry(QtCore.QRect(15,80,800,60))
        self.time.setObjectName("time")
        #setFont(QtGui.QFont("Font_name",Font_size))
        self.time.setFont(QtGui.QFont("맑은 고딕",50)) 

        #date 이라는 이름으로 label 생성 [년/월/일]
        self.date = QtWidgets.QLabel(self.centralwidget)
        self.date.setGeometry(QtCore.QRect(15, 15, 300, 50))
        self.date.setObjectName("date")
        self.date.setFont(QtGui.QFont("맑은 고딕",20))

        #지금 재생중
        self.now_playing = QtWidgets.QLabel(self.centralwidget)
        self.now_playing.setGeometry(QtCore.QRect(self.width-470,self.height-1000,470,50))
        self.now_playing.setObjectName("now_playing")
        self.now_playing.setFont(QtGui.QFont("맑은 고딕",15))

        self.now_playing_title = QtWidgets.QLabel(self.centralwidget)
        self.now_playing_title.setGeometry(QtCore.QRect(self.width-470,self.height-970,470,50))
        self.now_playing_title.setObjectName("now_playing_title")
        self.now_playing_title.setFont(QtGui.QFont("맑은 고딕",15))

        #에코 음성인식 처리
        self.eco_info = QtWidgets.QLabel(self.centralwidget)
        self.eco_info.setGeometry(QtCore.QRect(self.width-330,self.height-920,470,50))
        self.eco_info.setObjectName("eco_info")
        self.eco_info.setFont(QtGui.QFont("맑은 고딕",20))
        #self.eco_info.clicked.connect(QtCore.instance().quit)

        self.eco_qrcode = QtWidgets.QLabel(self.centralwidget)
        self.eco_qrcode.setGeometry(QtCore.QRect(self.width-470,self.height-910,128,128))
        self.eco_qrcode.setObjectName("eco_qrcode")

        # self.eco_command = QtWidgets.QLabel(self.centralwidget)
        # self.eco_command.setGeometry(QtCore.QRect(self.width-470,self.height-870,470,100))
        # self.eco_command.setObjectName("eco_command")
        # self.eco_command.setFont(QtGui.QFont("맑은 고딕",15))

        self.eco_detect = QtWidgets.QLabel(self.centralwidget)
        self.eco_detect.setGeometry(QtCore.QRect(150,160,1000,700))
        #self.eco_detect.setGeometry(QtCore.QRect(self.width-470,self.height-830,470,100))
        self.eco_detect.setObjectName("eco_detect")
        self.eco_detect.setFont(QtGui.QFont("맑은 고딕",30))

        self.speech_icon = QtWidgets.QLabel(self.centralwidget)
        self.speech_icon.setGeometry(QtCore.QRect(20, 160, 150, 700))
        self.speech_icon.setObjectName("speech_icon")

        self.speech_checked = QtWidgets.QLabel(self.centralwidget)
        self.speech_checked.setGeometry(QtCore.QRect(575, 160, 150, 700))
        self.speech_checked.setObjectName("speech_checked")


        # 코로나
        self.naver_corona_title = QtWidgets.QLabel(self.centralwidget)
        self.naver_corona_title.setGeometry(QtCore.QRect(self.width-1250,self.height-380,470,50))
        self.naver_corona_title.setObjectName("naver_corona_title")
        self.naver_corona_title.setFont(QtGui.QFont("맑은 고딕",15))

        self.yesterday_today_cel = QtWidgets.QLabel(self.centralwidget)
        self.yesterday_today_cel.setGeometry(QtCore.QRect(self.width-1100,self.height-380,470,50))
        self.yesterday_today_cel.setObjectName("yesterday_today_cel")
        self.yesterday_today_cel.setFont(QtGui.QFont("맑은 고딕",12))
        
        self.naver_corona1 = QtWidgets.QLabel(self.centralwidget)
        self.naver_corona1.setGeometry(QtCore.QRect(self.width-1250,self.height-350,470,50))
        self.naver_corona1.setObjectName("naver_corona1")
        self.naver_corona1.setFont(QtGui.QFont("맑은 고딕",11))

        self.naver_corona2 = QtWidgets.QLabel(self.centralwidget)
        self.naver_corona2.setGeometry(QtCore.QRect(self.width-1250,self.height-320,470,50))
        self.naver_corona2.setObjectName("naver_corona2")
        self.naver_corona2.setFont(QtGui.QFont("맑은 고딕",11))
    
        self.naver_corona3 = QtWidgets.QLabel(self.centralwidget)
        self.naver_corona3.setGeometry(QtCore.QRect(self.width-1250,self.height-290,470,50))
        self.naver_corona3.setObjectName("naver_corona3")
        self.naver_corona3.setFont(QtGui.QFont("맑은 고딕",11))

        self.naver_corona4 = QtWidgets.QLabel(self.centralwidget)
        self.naver_corona4.setGeometry(QtCore.QRect(self.width-1250,self.height-260,470,50))
        self.naver_corona4.setObjectName("naver_corona4")
        self.naver_corona4.setFont(QtGui.QFont("맑은 고딕",11))

        self.naver_corona1_num = QtWidgets.QLabel(self.centralwidget)
        self.naver_corona1_num.setGeometry(QtCore.QRect(self.width-1120,self.height-350,470,50))
        self.naver_corona1_num.setObjectName("naver_corona1_num")
        self.naver_corona1_num.setFont(QtGui.QFont("맑은 고딕",11))

        self.naver_corona2_num = QtWidgets.QLabel(self.centralwidget)
        self.naver_corona2_num.setGeometry(QtCore.QRect(self.width-1120,self.height-320,470,50))
        self.naver_corona2_num.setObjectName("naver_corona2_num")
        self.naver_corona2_num.setFont(QtGui.QFont("맑은 고딕",11))
    
        self.naver_corona3_num = QtWidgets.QLabel(self.centralwidget)
        self.naver_corona3_num.setGeometry(QtCore.QRect(self.width-1120,self.height-290,470,50))
        self.naver_corona3_num.setObjectName("naver_corona3_num")
        self.naver_corona3_num.setFont(QtGui.QFont("맑은 고딕",11))

        self.naver_corona4_num = QtWidgets.QLabel(self.centralwidget)
        self.naver_corona4_num.setGeometry(QtCore.QRect(self.width-1120,self.height-260,470,50))
        self.naver_corona4_num.setObjectName("naver_corona4_num")
        self.naver_corona4_num.setFont(QtGui.QFont("맑은 고딕",11))

        self.naver_corona_title_7 = QtWidgets.QLabel(self.centralwidget)
        self.naver_corona_title_7.setGeometry(QtCore.QRect(self.width-950,self.height-380,470,50))
        self.naver_corona_title_7.setObjectName("naver_corona_title_7")
        self.naver_corona_title_7.setFont(QtGui.QFont("맑은 고딕",15))
        
        self.naver_corona1_7 = QtWidgets.QLabel(self.centralwidget)
        self.naver_corona1_7.setGeometry(QtCore.QRect(self.width-950,self.height-350,470,50))
        self.naver_corona1_7.setObjectName("naver_corona1_7")
        self.naver_corona1_7.setFont(QtGui.QFont("맑은 고딕",11))

        self.naver_corona2_7 = QtWidgets.QLabel(self.centralwidget)
        self.naver_corona2_7.setGeometry(QtCore.QRect(self.width-950,self.height-320,470,50))
        self.naver_corona2_7.setObjectName("naver_corona2_7")
        self.naver_corona2_7.setFont(QtGui.QFont("맑은 고딕",11))
    
        self.naver_corona3_7 = QtWidgets.QLabel(self.centralwidget)
        self.naver_corona3_7.setGeometry(QtCore.QRect(self.width-950,self.height-290,470,50))
        self.naver_corona3_7.setObjectName("naver_corona3_7")
        self.naver_corona3_7.setFont(QtGui.QFont("맑은 고딕",11))

        self.naver_corona4_7 = QtWidgets.QLabel(self.centralwidget)
        self.naver_corona4_7.setGeometry(QtCore.QRect(self.width-950,self.height-260,470,50))
        self.naver_corona4_7.setObjectName("naver_corona4_7")
        self.naver_corona4_7.setFont(QtGui.QFont("맑은 고딕",11))

        self.corona_news_headline = QtWidgets.QLabel(self.centralwidget)
        self.corona_news_headline.setGeometry(QtCore.QRect(self.width-1250,self.height-220,470,50))
        self.corona_news_headline.setObjectName("corona_news_headline")
        self.corona_news_headline.setFont(QtGui.QFont("맑은 고딕",15))

        self.corona_news1 = QtWidgets.QLabel(self.centralwidget)
        self.corona_news1.setGeometry(QtCore.QRect(self.width-1250,self.height-190,470,50))
        self.corona_news1.setObjectName("corona_news1")
        self.corona_news1.setFont(QtGui.QFont("맑은 고딕",11))

        self.corona_news2 = QtWidgets.QLabel(self.centralwidget)
        self.corona_news2.setGeometry(QtCore.QRect(self.width-1250,self.height-160,470,50))
        self.corona_news2.setObjectName("corona_news2")
        self.corona_news2.setFont(QtGui.QFont("맑은 고딕",11))

        self.corona_news3 = QtWidgets.QLabel(self.centralwidget)
        self.corona_news3.setGeometry(QtCore.QRect(self.width-1250,self.height-130,470,50))
        self.corona_news3.setObjectName("corona_news3")
        self.corona_news3.setFont(QtGui.QFont("맑은 고딕",11))

        self.corona_news4 = QtWidgets.QLabel(self.centralwidget)
        self.corona_news4.setGeometry(QtCore.QRect(self.width-1250,self.height-100,470,50))
        self.corona_news4.setObjectName("corona_news4")
        self.corona_news4.setFont(QtGui.QFont("맑은 고딕",11))

        self.corona_news5 = QtWidgets.QLabel(self.centralwidget)
        self.corona_news5.setGeometry(QtCore.QRect(self.width-1250,self.height-70,470,50))
        self.corona_news5.setObjectName("corona_news5")
        self.corona_news5.setFont(QtGui.QFont("맑은 고딕",11))

        #news label 생성
        self.news_headline = QtWidgets.QLabel(self.centralwidget)
        self.news_headline.setGeometry(QtCore.QRect(self.width-470,self.height-380,470,50))
        self.news_headline.setObjectName("news_headline")
        self.news_headline.setFont(QtGui.QFont("맑은 고딕",15))

        self.news1 = QtWidgets.QLabel(self.centralwidget)
        self.news1.setGeometry(QtCore.QRect(self.width-470,self.height-350,470,50))
        self.news1.setObjectName("news1")
        self.news1.setFont(QtGui.QFont("맑은 고딕",11))

        self.news2 = QtWidgets.QLabel(self.centralwidget)
        self.news2.setGeometry(QtCore.QRect(self.width-470,self.height-320,470,50))
        self.news2.setObjectName("news2")
        self.news2.setFont(QtGui.QFont("맑은 고딕",11))

        self.news3 = QtWidgets.QLabel(self.centralwidget)
        self.news3.setGeometry(QtCore.QRect(self.width-470,self.height-290,470,50))
        self.news3.setObjectName("news3")
        self.news3.setFont(QtGui.QFont("맑은 고딕",11))

        self.news4 = QtWidgets.QLabel(self.centralwidget)
        self.news4.setGeometry(QtCore.QRect(self.width-470,self.height-260,470,50))
        self.news4.setObjectName("news4")
        self.news4.setFont(QtGui.QFont("맑은 고딕",11))

        self.news5 = QtWidgets.QLabel(self.centralwidget)
        self.news5.setGeometry(QtCore.QRect(self.width-470,self.height-230,470,50))
        self.news5.setObjectName("news5")
        self.news5.setFont(QtGui.QFont("맑은 고딕",11))

        self.news6 = QtWidgets.QLabel(self.centralwidget)
        self.news6.setGeometry(QtCore.QRect(self.width-470,self.height-200,470,50))
        self.news6.setObjectName("news6")
        self.news6.setFont(QtGui.QFont("맑은 고딕",11))

        self.news7 = QtWidgets.QLabel(self.centralwidget)
        self.news7.setGeometry(QtCore.QRect(self.width-470,self.height-170,470,50))
        self.news7.setObjectName("news7")
        self.news7.setFont(QtGui.QFont("맑은 고딕",11))

        self.news8 = QtWidgets.QLabel(self.centralwidget)
        self.news8.setGeometry(QtCore.QRect(self.width-470,self.height-140,470,50))
        self.news8.setObjectName("news8")
        self.news8.setFont(QtGui.QFont("맑은 고딕",11))

        self.news9 = QtWidgets.QLabel(self.centralwidget)
        self.news9.setGeometry(QtCore.QRect(self.width-470,self.height-110,470,50))
        self.news9.setObjectName("news9")
        self.news9.setFont(QtGui.QFont("맑은 고딕",11))

        self.news10 = QtWidgets.QLabel(self.centralwidget)
        self.news10.setGeometry(QtCore.QRect(self.width-470,self.height-80,470,50))
        self.news10.setObjectName("news10")
        self.news10.setFont(QtGui.QFont("맑은 고딕",11))

        #sql label 생성
        self.username = QtWidgets.QLabel(self.centralwidget)
        self.username.setGeometry(QtCore.QRect(105,160,2000,750))
        self.username.setObjectName("username")
        self.username.setFont(QtGui.QFont("맑은 고딕",60))

        #날씨정보 출력

        self.weather = QtWidgets.QLabel(self.centralwidget)
        self.weather.setGeometry(QtCore.QRect(20, 160, 150,130))
        self.weather.setObjectName("weather")

        self.w1 = QtWidgets.QLabel(self.centralwidget)
        self.w1.setGeometry(QtCore.QRect(180,150,470,50))
        self.w1.setObjectName("w1")
        self.w1.setFont(QtGui.QFont("맑은 고딕",20))

        self.w2 = QtWidgets.QLabel(self.centralwidget)
        self.w2.setGeometry(QtCore.QRect(180,180,470,50))
        self.w2.setObjectName("w2")
        self.w2.setFont(QtGui.QFont("맑은 고딕",20))

        self.w3 = QtWidgets.QLabel(self.centralwidget)
        self.w3.setGeometry(QtCore.QRect(180,210,470,50))
        self.w3.setObjectName("w3")
        self.w3.setFont(QtGui.QFont("맑은 고딕",20))

        self.w4 = QtWidgets.QLabel(self.centralwidget)
        self.w4.setGeometry(QtCore.QRect(180,240,470,50))
        self.w4.setObjectName("w4")
        self.w4.setFont(QtGui.QFont("맑은 고딕",20))
        
        #미세먼지 출력
        self.air1 = QtWidgets.QLabel(self.centralwidget)
        self.air1.setGeometry(QtCore.QRect(180,280,470,50))
        self.air1.setObjectName("air1")
        self.air1.setFont(QtGui.QFont("맑은 고딕",20))

        self.air2 = QtWidgets.QLabel(self.centralwidget)
        self.air2.setGeometry(QtCore.QRect(180,310,470,50))
        self.air2.setObjectName("air2")
        self.air2.setFont(QtGui.QFont("맑은 고딕",20))

        self.air3 = QtWidgets.QLabel(self.centralwidget)
        self.air3.setGeometry(QtCore.QRect(180,340,1400,50))
        self.air3.setObjectName("air3")
        self.air3.setFont(QtGui.QFont("맑은 고딕",20))
        
        self.air_value_display = QtWidgets.QLabel(self.centralwidget)
        self.air_value_display.move(50,305)
        self.air_value_display.resize(470, 60)
        #self.air_value_display.setGeometry(QtCore.QRect(50,305,470,60))
        self.air_value_display.setObjectName("air_value_display")
        self.air_value_display.setFont(QtGui.QFont("맑은 고딕",50))
        

        MainWindow.setCentralWidget(self.centralwidget)
        self.menubar = QtWidgets.QMenuBar(MainWindow)
        self.menubar.setGeometry(QtCore.QRect(0, 0, 800, 21))
        self.menubar.setObjectName("menubar")
        MainWindow.setMenuBar(self.menubar)
        self.statusbar = QtWidgets.QStatusBar(MainWindow)
        self.statusbar.setObjectName("statusbar")
        MainWindow.setStatusBar(self.statusbar)

        self.retranslateUi(MainWindow)
        QtCore.QMetaObject.connectSlotsByName(MainWindow)

    def retranslateUi(self, MainWindow):
        _translate = QtCore.QCoreApplication.translate
        MainWindow.setWindowTitle(_translate("MainWindow", "스마트 미러"))

    def hello(self,MainWindow):
        self.hello_world = self.hello_world + 1
        self.clock.setText("%d %s" %(self.hello_world, "hello world"))

    def set_time(self,MainWindow):
        EvenOrAfter = "오전"
        while True:
            QApplication.processEvents() 
            now=datetime.now() #현재 시각을 시스템에서 가져옴
            hour=now.hour

            if(now.hour>=12):
                EvenOrAfter="오후"
                hour=now.hour%12

                if(now.hour==12):
                    hour=12

            else:
                EvenOrAfter="오전"

            self.date.setText("%s년 %s월 %s일"%(now.year,now.month,now.day))
            self.time.setText(EvenOrAfter+" %s시 %s분" %(hour,now.minute))
            QTest.qWait(1000)
            #sleep(1)

    def News(self,MainWindow) :
        d = feedparser.parse(self.News_url)
        self.news_headline.setText("뉴스 헤드라인")
        while True :
            try:
                QApplication.processEvents() 
                num = 1
                for e in d.entries :
                    if num%10==1:
                        self.news1.setText("[%d] %s"%(num,e.title))
                    elif num%10==2:
                        self.news2.setText("[%d] %s"%(num,e.title))
                    elif num%10==3:
                        self.news3.setText("[%d] %s"%(num,e.title))
                    elif num%10==4:
                        self.news4.setText("[%d] %s"%(num,e.title))
                    elif num%10==5:
                        self.news5.setText("[%d] %s"%(num,e.title))
                    elif num%10==6:
                        self.news6.setText("[%d] %s"%(num,e.title))
                    elif num%10==7:
                        self.news7.setText("[%d] %s"%(num,e.title))
                    elif num%10==8:
                        self.news8.setText("[%d] %s"%(num,e.title))
                    elif num%10==9:
                        self.news9.setText("[%d] %s"%(num,e.title))
                    elif num%10==0:
                        self.news10.setText("[%d] %s"%(num,e.title))
                    num=num+1
                    QTest.qWait(1000)
                    if num == 21:
                        d = feedparser.parse(self.News_url)
                        QTest.qWait(1000)
            except:
                #pass
                print("뉴스 스레드 - 예외가 발생 하였습니다.")
                #sleep(1)

    def now_playing_load(self,MainWindow):
        mydb3 = mysql.connector.connect(
            host="imgkr.duckdns.org",
            port = 33006,
            user="root",
            passwd="Maria0009!",
            database="detect_server" 
        )
        mc3 = mydb3.cursor()
        self.eco_info.setText('에코를 만나보세요.')
        self.eco_qrcode.setPixmap(QtGui.QPixmap("img/qrcode.png"))
        old_check_data = 'DATA_NONE'
        old_check_playing = 'DATA_NONE'
        old_check_playing_title = 'DATA_NONE'
        # self.eco_command.setText('에코야 음악 틀어 줘\n에코야 날씨 알려 줘\n에코야 오늘 확진자 몇 명이야?\n에코야 오늘 날씨 어때?')
        while True:
            QApplication.processEvents() 
            sql3 = "SELECT * FROM speech LIMIT 1"
            #val = (target,)
            mc3.execute(sql3)
            data3 = mc3.fetchall()
            mydb3.commit()

            playing = data3[0][1]
            playing_title = data3[0][2]
            speech_detect = data3[0][3]
            #print(playing)
            # 재생중인지 확인
            # if old_check_playing == 'DATA_NONE':
            #     old_check_playing = playing
            #     if playing == 'YES':
            #         self.now_playing.setText('지금 재생중')
            #         self.now_playing_title.setText(playing_title)
            #     else:
            #         self.now_playing.clear()
            #         self.now_playing_title.clear()
            # elif old_check_playing != playing:
            #     old_check_playing = playing
            #     if playing == 'YES':
            #         self.now_playing.setText('지금 재생중')
            #         self.now_playing_title.setText(playing_title)
            #     else:
            #         self.now_playing.clear()
            #         self.now_playing_title.clear()

            #
            if old_check_playing_title == 'DATA_NONE':
                old_check_playing_title = playing_title
                if playing_title != 'NONE':
                    self.now_playing.setText('지금 재생중')
                    self.now_playing_title.setText(playing_title)
                else:
                    self.now_playing.clear()
                    self.now_playing_title.clear()
            elif old_check_playing_title != playing_title:
                old_check_playing_title = playing_title
                if playing_title != 'NONE':
                    self.now_playing.setText('지금 재생중')
                    self.now_playing_title.setText(playing_title)
                else:
                    self.now_playing.clear()
                    self.now_playing_title.clear()


            #self.speech_icon.setPixmap(QtGui.QPixmap("speech_detect.png"))
            if old_check_data == 'DATA_NONE':
                old_check_data = speech_detect
                if speech_detect == 'NONE':
                    self.eco_detect.clear()
                    self.speech_icon.clear()
                    self.speech_checked.clear()
                elif speech_detect == 'checked':
                    self.eco_detect.clear()
                    self.speech_icon.clear()
                    self.speech_checked.setPixmap(QtGui.QPixmap("img/check.png"))
                else:
                    speech_detect = speech_detect.replace('백호','에코')
                    self.eco_detect.setText(speech_detect)
                    self.speech_icon.setPixmap(QtGui.QPixmap("img/speech_detect.png"))
                    self.speech_checked.clear()
            elif old_check_data != speech_detect:
                old_check_data = speech_detect
                if speech_detect == 'NONE':
                    self.eco_detect.clear()
                    self.speech_icon.clear()
                    self.speech_checked.clear()
                    old_check_data = speech_detect
                elif speech_detect == 'checked':
                    self.eco_detect.clear()
                    self.speech_icon.clear()
                    self.speech_checked.setPixmap(QtGui.QPixmap("img/check.png"))
                else:
                    speech_detect = speech_detect.replace('백호','에코')
                    self.eco_detect.setText(speech_detect)
                    self.speech_icon.setPixmap(QtGui.QPixmap("img/speech_detect.png"))
                    self.speech_checked.clear()
            #else:

                # time.sleep(2.5)
                # sql3 = "UPDATE speech SET speech_detect = %s WHERE id = 1"
                # val3 = ('', )
                # mc3.execute(sql3, val3)
                # mydb3.commit()
                #QTest.qWait(1500)
            #sleep(1.5)
            #time.sleep(1)

    def sql_data_load(self,MainWindow):
        mydb = mysql.connector.connect(
            host="imgkr.duckdns.org",
            port = 33006,
            user="root",
            passwd="Maria0009!",
            database="detect_server" 
        )
        mc = mydb.cursor()
        while True:
            QApplication.processEvents() 
            sql = "SELECT * FROM detect_log ORDER BY detect_time DESC LIMIT 1"
            #val = (target,)
            mc.execute(sql)
            data = mc.fetchall()
            mydb.commit()

            username = data[0][1]
            detect_time = float(time.time())
            old_detect_time = float(data[0][3])
            noti = data[0][4]
            if noti == 'NEW':
                celtime = detect_time - old_detect_time
                celtime2 = str(celtime)
                if celtime > 5:
                    if username == 'SeungHwan' or username == 'HyeonWoo' or username == 'Siro' or username == 'HyeongCheon':
                        print(username, detect_time, old_detect_time, celtime2)
                        target = username
                        self.username.setText(target + '님 안녕하세요.')
                        QTest.qWait(5000)
                        #sleep(5)
                        self.username.clear()
                        sql = "UPDATE detect_log SET noti = %s WHERE name = %s"
                        val = ('NO', target)
                        mc.execute(sql, val)
                        mydb.commit()
                        #return username
                    else:
                        target = username
                        self.username.setText('등록되지 않은 사용자가 감지됨.')
                        QTest.qWait(5000)
                        #sleep(5)
                        self.username.clear()
                        sql = "UPDATE detect_log SET noti = %s WHERE name = %s"
                        val = ('NO', target)
                        mc.execute(sql, val)
                        mydb.commit()

                else:
                    self.username.clear()
                    print(username + "이(가) 감지는 되었지만 재감지후 5초 이내.")
            else:
                QTest.qWait(1500)
                #print('표시할 데이터가 없습니다.')

    def naver_corona(self,MainWindow):
        try:
            mydb4 = mysql.connector.connect(
                host="imgkr.duckdns.org",
                port = 33006,
                user="root",
                passwd="Maria0009!",
                database="detect_server" 
            )
            mc4 = mydb4.cursor()
            self.naver_corona_title.setText('코로나 발생현황')
            self.naver_corona_title_7.setText('최근 7일 평균')
            
            while True:
                
                QApplication.processEvents() 
                today = str(datetime.today()).split(" ")[0]

                sql4 = "SELECT * FROM corona_info WHERE date = %s"
                val = (today, )
                mc4.execute(sql4, val)
                data4 = mc4.fetchall()
                mydb4.commit()
                if not data4:
                    sql_today_data = "NO"
                else:
                    sql_today_data = "YES"

                response = requests.get('https://search.naver.com/search.naver?where=nexearch&sm=top_sug.pre&fbm=0&acr=8&acq=%EC%BD%94%EB%A1%9C%EB%82%98&qdt=0&ie=utf8&query=%EC%BD%94%EB%A1%9C%EB%82%98')
                #print(response.text)
                
                temp = str(response.text)

                response = requests.get('http://ncov.mohw.go.kr/')
                #print(response.text)
                
                temp2 = str(response.text)

                total_confirmation = temp2.split('(누적)확진</span>')[1].split('<a href')[0]
                total_death = temp2.split('(누적)사망</span>')[1].split('</div>')[0]

                #naver_corona_title

                #corona_temp = temp.split('일일 확진</strong>')[1].split('<div class=\"csp_tab_area _tab_root\">')[0]

                daily_confirmation = temp.split('일일 확진</strong> <p class=\"info_num\">')[1].split('</p>')[0]
                financial_seriousness = temp.split('위중증</strong> <p class=\"info_num\">')[1].split('</p>')[0]
                new_hospitalization = temp.split('신규 입원</strong> <p class=\"info_num\">')[1].split('</p>')[0]
                daily_death = temp.split('일일 사망</strong> <p class=\"info_num\">')[1].split('</p>')[0]

                self.naver_corona1.setText('일일 확진(누적) : ')
                self.naver_corona2.setText('재원 위중증 : ')
                self.naver_corona3.setText('신규 입원 : ')
                self.naver_corona4.setText('일일 사망(누적) : ')

                self.naver_corona1_num.setText(daily_confirmation + '(' + total_confirmation + ')')
                self.naver_corona2_num.setText(financial_seriousness)
                self.naver_corona3_num.setText(new_hospitalization)
                self.naver_corona4_num.setText(daily_death + '(' + total_death + ')')

                #response = requests.get('http://ncov.mohw.go.kr/')
                #print(response.text)
                
                #temp = str(response.text)

                #naver_corona_title

                corona_temp = temp2.split('최근 7일간<br>일평균</span></th>')[1].split('</tbody>')[0]

                daily_confirmation_7 = corona_temp.split('<td><span>')[4].split('</span></td>')[0]
                financial_seriousness_7 = corona_temp.split('<td><span>')[2].split('</span></td>')[0]
                new_hospitalization_7 = corona_temp.split('<td><span>')[3].split('</span></td>')[0]
                daily_death_7 = corona_temp.split('<td><span>')[1].split('</span></td>')[0]

                self.naver_corona1_7.setText(daily_confirmation_7)
                self.naver_corona2_7.setText(financial_seriousness_7)
                self.naver_corona3_7.setText(new_hospitalization_7)
                self.naver_corona4_7.setText(daily_death_7)
                if sql_today_data == 'YES':
                    sql4 = "UPDATE corona_info SET daily_confirmation = %s, financial_seriousness = %s, new_hospitalization = %s, daily_death = %s, daily_confirmation_7 = %s, financial_seriousness_7 = %s, new_hospitalization_7 = %s, daily_death_7 = %s WHERE date = %s"
                    val = (daily_confirmation, financial_seriousness, new_hospitalization, daily_death, daily_confirmation_7, financial_seriousness_7, new_hospitalization_7, daily_death_7, today)
                    mc4.execute(sql4, val)
                    mydb4.commit()

                    sql4 = "SELECT * FROM corona_info ORDER BY date DESC LIMIT 2;"
                    #val = (today, )
                    mc4.execute(sql4)
                    data4 = mc4.fetchall()
                    mydb4.commit()

                    yesterday_confirmation = data4[1][2].replace(',', '')
                    today_confirmation = data4[0][2].replace(',', '')
                    cel_confirmation = int(today_confirmation) - int(yesterday_confirmation)
                    cel_confirmation = str(cel_confirmation)
                    if cel_confirmation == '0':
                        self.yesterday_today_cel.clear()
                    elif '-' in cel_confirmation:
                        cel_confirmation = '▼ ' + format(int(cel_confirmation), ',').replace('-','')
                        self.yesterday_today_cel.setText(cel_confirmation)
                    else:
                        cel_confirmation = '▲ ' + format(int(cel_confirmation), ',')
                        self.yesterday_today_cel.setText(cel_confirmation)

                elif sql_today_data == 'NO':
                    sql4 = "INSERT corona_info SET daily_confirmation = %s, financial_seriousness = %s, new_hospitalization = %s, daily_death = %s, daily_confirmation_7 = %s, financial_seriousness_7 = %s, new_hospitalization_7 = %s, daily_death_7 = %s, date = %s"
                    val = (daily_confirmation, financial_seriousness, new_hospitalization, daily_death, daily_confirmation_7, financial_seriousness_7, new_hospitalization_7, daily_death_7, today)
                    mc4.execute(sql4, val)
                    mydb4.commit()

                    sql4 = "SELECT * FROM corona_info ORDER BY date DESC LIMIT 2;"
                    #val = (today, )
                    mc4.execute(sql4)
                    data4 = mc4.fetchall()
                    mydb4.commit()

                    yesterday_confirmation = data4[1][2].replace(',', '')
                    today_confirmation = daily_confirmation.replace(',', '')
                    cel_confirmation = int(today_confirmation) - int(yesterday_confirmation)
                    cel_confirmation = str(cel_confirmation)
                    if cel_confirmation == '0':
                        self.yesterday_today_cel.clear()
                    elif '-' in cel_confirmation:
                        cel_confirmation = '▼ ' + format(int(cel_confirmation), ',').replace('-','')
                        self.yesterday_today_cel.setText(cel_confirmation)
                    else:
                        cel_confirmation = '▲ ' + format(int(cel_confirmation), ',')
                        self.yesterday_today_cel.setText(cel_confirmation)

                QTest.qWait(1500)

                response = requests.get('http://ncov.mohw.go.kr/tcmBoardList.do?brdId=3&brdGubun=')
                #print(response.text)
                
                temp = str(response.text)

                #naver_corona_title

                #corona_temp = temp.split('최근 7일간<br>일평균</span></th>')[1].split('</tbody>')[0]
                self.corona_news_headline.setText('코로나 관련 뉴스')
                i = 1
                for i in range(1, 6):

                    corona_news = temp.split('\'ALL\');">')[i].split('</a>')[0]
                    if i == 1:
                        self.corona_news1.setText(corona_news)
                    elif i == 2:
                        self.corona_news2.setText(corona_news)
                    elif i == 3:
                        self.corona_news3.setText(corona_news)
                    elif i == 4:
                        self.corona_news4.setText(corona_news)
                    elif i == 5:
                        self.corona_news5.setText(corona_news)

                    #i = i + 1
                QTest.qWait(300000)
            #sleep(300)
        except:    # 예외가 발생했을 때 실행됨
            print('코로나 스레드 - 예외가 발생했습니다.')
        

    def naver_w(self,MainWindow):
        try:
            mydb2 = mysql.connector.connect(
                host="imgkr.duckdns.org",
                port = 33006,
                user="root",
                passwd="Maria0009!",
                database="detect_server" 
            )
            mc2 = mydb2.cursor()
            while True:

                QApplication.processEvents() 
                response = requests.get('https://weather.naver.com/today/02273101')
                #print(response.text)
                
                temp = str(response.text)
                location = temp.split('location_name\">')[1].split('</strong>')[0]
                weather_area = temp.split('weather_area\">')[1].split('<div class="time_weather">')[0]
                now_current = weather_area.split('현재 온도</span>')[1].split('<span class=')[0]
                now_weather = weather_area.split('<span class=\"weather\">')[1].split('</span>')[0]
                if 'temperature up\">' in weather_area:
                    today_info = '어제보다 ' + weather_area.split('temperature up\">')[1].split('</span>')[0].replace('<span class="blind">','')
                elif 'temperature down\">' in weather_area:
                    today_info = '어제보다 ' + weather_area.split('temperature down\">')[1].split('</span>')[0].replace('<span class="blind">','')
                else:
                    today_info = '어제와 같은 기온 이에요'
                # print(weather_area)
                self.w1.setText(location + ' 날씨 정보')
                self.w2.setText('현재온도 : ' + now_current + '°')
                self.w3.setText('날씨상태 : ' + now_weather)
                self.w4.setText(today_info)

                sql2 = "UPDATE weather_info SET current = %s, weather_info = %s, today_info = %s WHERE id = 1"
                val = (now_current, now_weather, today_info)
                mc2.execute(sql2, val)
                mydb2.commit()

                #if "day" in weather_cashe:
                if (now_weather == '맑음'):
                    self.weather.setPixmap(QtGui.QPixmap("weather_icon/sun.png"))
                elif(now_weather == '흐림'):
                    self.weather.setPixmap(QtGui.QPixmap("weather_icon/cloudy_day.png"))
                elif(now_weather == '구름많음'):
                    self.weather.setPixmap(QtGui.QPixmap("weather_icon/clouds.png"))
                elif(now_weather == '눈'):
                    self.weather.setPixmap(QtGui.QPixmap("weather_icon/snowflake.png"))
                elif(now_weather == '비'):
                    self.weather.setPixmap(QtGui.QPixmap("weather_icon/drop.png"))
                    
                # elif "clear" in weather_cashe:
                #     self.weather.setPixmap(QtGui.QPixmap("weather_icon\sun.png"))

                air_quality = requests.get('https://weather.com/ko-KR/forecast/air-quality/l/b7e0e86a151bd4a6d72239bbaac6670c9e161d99f40fb2a1dbe341bef359643f')
                temp2 = str(air_quality.text)
                #print(temp2)

                air_value = temp2.split('DonutChartValue\">')[1].split('</text>')[0]
                air_25 = temp2.split('AirQualityCategory\">')[1].split('</span>')[0]
                air_25_2 = temp2.split('AirQualityMeasurement\">')[1].split('</span>')[0]
                air_10 = temp2.split('AirQualitySeverity\">')[5].split('</p>')[0]
                air_10_2 = temp2.split('AirQualityMeasurement\">')[5].split('</span>')[0]

                if len(air_value) == 2:
                    self.air_value_display.move(50,305)
                elif len(air_value) == 3:
                    self.air_value_display.move(27,305)


                self.air_value_display.setText(air_value)
                self.air1.setText('대기 품질')
                self.air2.setText('PM2.5 : ' + air_25 + '(' + air_25_2 + ')')
                self.air3.setText('PM10 : ' + air_10 + '(' + air_10_2 + ')')
                #self.air3.setText('대기품질 요약 : ' + air_text)
                # elif "night" in weather_cashe:
                #     if "partly-cloudy" in weather_cashe:
                #         self.weather.setPixmap(QtGui.QPixmap("weather_icon\cloudy_night.png"))
                #     elif "cloudy" in weather_cashe:
                #         self.weather.setPixmap(QtGui.QPixmap("weather_icon\clouds.png"))
                #     elif "clear" in weather_cashe:
                #         self.weather.setPixmap(QtGui.QPixmap("weather_icon\moon.png"))
                
                # elif "cloudy" in weather_cashe:
                #     self.weather.setPixmap(QtGui.QPixmap("weather_icon\clouds.png"))

                # elif "rain" in weather_cashe:
                #     self.weather.setPixmap(QtGui.QPixmap("weather_icon\drop.png"))

                # elif "snow" in weather_cashe:
                #     self.weather.setPixmap(QtGui.QPixmap("weather_icon\snowflake.png"))

                # print('나의위치 : ' + location)
                # print('현재온도 : ' + now_current + '°')
                # print('날씨상태 : ' + now_weather)
                # print('어제보다 ' + today_info)
                QTest.qWait(300000)
        except:    # 예외가 발생했을 때 실행됨
            print('날씨 스레드 - 예외가 발생했습니다.')
            #sleep(300)

    def time_start(self,MainWindow):
        thread=threading.Thread(target=self.set_time,args=(self,))
        thread.daemon=True #프로그램 종료시 프로세스도 함께 종료 (백그라운드 재생 X)
        thread.start()

    def News_start(self,MainWindow):
        thread=threading.Thread(target=self.News,args=(self,))
        thread.daemon=True #프로그램 종료시 프로세스도 함께 종료 (백그라운드 재생 X)
        thread.start()

    def sql_load(self,MainWindow):
        thread=threading.Thread(target=self.sql_data_load,args=(self,))
        thread.daemon=True #프로그램 종료시 프로세스도 함께 종료 (백그라운드 재생 X)
        thread.start()

    def naver_w_start(self,MainWindow):
        thread=threading.Thread(target=self.naver_w,args=(self,))
        thread.daemon=True #프로그램 종료시 프로세스도 함께 종료 (백그라운드 재생 X)
        thread.start()
    def now_playing_load_start(self,MainWindow):
        thread=threading.Thread(target=self.now_playing_load,args=(self,))
        thread.daemon=True #프로그램 종료시 프로세스도 함께 종료 (백그라운드 재생 X)
        thread.start()
    def naver_corona_start(self,MainWindow):
        thread=threading.Thread(target=self.naver_corona,args=(self,))
        thread.daemon=True #프로그램 종료시 프로세스도 함께 종료 (백그라운드 재생 X)
        thread.start()
 


if __name__=="__main__":
    import sys
    app = QtWidgets.QApplication(sys.argv)
    MainWindow = QtWidgets.QMainWindow()
    

    ui = Ui_MainWindow()
    ui.setupUi(MainWindow)

    ui.time_start(MainWindow) #time thread
    ui.sql_load(MainWindow) #sql thread
    ui.News_start(MainWindow)
    ui.now_playing_load_start(MainWindow)
    ui.naver_corona_start(MainWindow)
    ui.naver_w_start(MainWindow) #naver_w thread

    MainWindow.show()
    sys.exit(app.exec_())