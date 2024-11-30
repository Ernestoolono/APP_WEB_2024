from django.urls import path
from . import views

urlpatterns = [
    path('',views.index,name='inicio'),
    path('inicio/',views.index,name='inicio'),
    path('about/',views.about,name='acercade'),
    path('mision/',views.mision,name='mision'),
    path('vision/',views.vision,name='vision'),
    path('registro/',views.registro,name='registro'),
    path('iniciodesesion/',views.iniciodesesion,name='iniciodesesion'),
     path('logout/',views.logout_user,name='logout'),
]
