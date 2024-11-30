from django.urls import path
from . import views

urlpatterns = [
    path('Listado_articulos/',views.list_art,name='Listado_articulos'),
    path('Listado_categorias/',views.list_cat,name='Listado_categorias'),
]
