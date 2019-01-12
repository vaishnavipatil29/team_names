from django.contrib import admin

from .models import User,Attendance,Image,Task,UserTask, Video
admin.site.register(User)
admin.site.register(UserTask)
admin.site.register(Attendance)
admin.site.register(Image)
admin.site.register(Task)
admin.site.register(Video)