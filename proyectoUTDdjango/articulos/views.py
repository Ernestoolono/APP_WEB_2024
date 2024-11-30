from django.shortcuts import render
from django.contrib.auth.decorators import login_required
from articulos.models import Article, Category

# Create your views here.
@login_required(login_url='inicio')
def list_art(request):

    #sacar los articulo de la BD
    articulos = Article.objects.all()

    return render(request,'articulos/listado_art.html',{
        'title':'Articulos',
        'content':'Listado de Articulos',
        'articulos':articulos
    })

@login_required(login_url='inicio')
def list_cat(request):

    #sacar los articulo de la BD
    categorias = Category.objects.all()

    return render(request,'categorias/listado_cat.html',{
        'title':'Categorias',
        'content':'Listado de Categorias',
        'categorias':categorias
    })
