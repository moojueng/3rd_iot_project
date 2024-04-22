from flask import Flask, render_template, Response, redirect
import argparse
from v3_fastest import *
import cv2
from config import config

import mysql.connector
mydb = mysql.connector.connect(
    host="DB ADDRESS",
    port = PORT,
    user="ID",
    passwd="PASSWORD",
    database="detect_server" 
)
mc = mydb.cursor()

class VideoCamera(object):
    def __init__(self):
        self.video = cv2.VideoCapture(0)

    def __del__(self):
        self.video.release()
    def get_frame(self):
        success, image = self.video.read()
        return image
temp_time = format(time.time())
for i in range(1, 14):
    sql = "UPDATE detect_log SET detect_time = %s, old_detect_time = %s, noti = %s WHERE id = %s"
    val = (temp_time, temp_time, 'NO', i)

    mc.execute(sql, val)

    mydb.commit()

app = Flask(__name__)

@app.route('/') 
def index():

    return render_template('index.html')


def v3_fastest(camera):
    while True:
        frame = camera.get_frame()
        v3_inference(frame)
        ret, jpeg = cv2.imencode('.jpg', frame)
        frame = jpeg.tobytes()
            
        yield (b'--frame\r\n'
            b'Content-Type: image/jpeg\r\n\r\n' + frame + b'\r\n\r\n')



@app.route('/video_feed')
def video_feed():
    if model == 'v3_fastest':
        return Response(v3_fastest(VideoCamera()),
            mimetype='multipart/x-mixed-replace; boundary=frame')

if __name__ == '__main__':
    parser = argparse.ArgumentParser(description='Object Detection using YOLO-Fastest in OPENCV')
    parser.add_argument('--model', type=str, default='v3_fastest', choices=['v3_fastest'])
    parser.add_argument('--semi-label', type=int, default=0, help="semi-label the frame or not")
    args = parser.parse_args()
    model = args.model
    app.run(host='0.0.0.0', debug=True, port=8000, threaded=True)
