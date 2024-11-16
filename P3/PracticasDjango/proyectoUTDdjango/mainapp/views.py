from django.shortcuts import render, redirect

# Create your views here.
def index(requets):
    return render(requets,'mainapp/index.html',{
        'title':'Inicio',
        'content':'.::Bienvenido a mi Pagina de Inicio::..'
    })

def about(requets):
    return render(requets,'mainapp/about.html',{
        'title':'acerca de...',
        'content':'.::Somos un equipo de SW multiplataforma con Django::..'
    })

def mision(requets):
    return render(requets,'mainapp/mision.html',{
        'title':'Mision',
    })

def vision(requets):
    return render(requets,'mainapp/vision.html',{
        'title':'Vision',
    })

# Redirijir a pagina incio con error404 1er forma
def error404(request,exception):
    return redirect('inicio')

# Redirijir a pagina inicio con error404 2da forma

def error404_2(request,exception):
    return render(request,'mainapp/404.html')