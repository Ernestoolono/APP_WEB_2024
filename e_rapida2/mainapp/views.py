from django.shortcuts import render

# Create your views here.

def index(request):
    return render(request, 'mainapp/index.html',{
        'title':'Inicio | pagina principal',
        'content':'..:: ¡Bienvenido a mi pagina principal! :::.'
    })

def about(request):
    return render(request, 'mainapp/about.html',{
        'title':'Acerca de',
        'content':'..:: Somos un equipo de Desarrollo de SW con Django! :::.'
    })

def mision(request):
    return render(request, 'mainapp/mision.html',{
        'title':'Mision',
    })

def vision(request):
    return render(request, 'mainapp/vision.html',{
        'title':'Vision',
    })
def registro(request):
    return render(request, 'mainapp/registro.html',{
        'title':'Registro',
    })

def iniciodesesion(request):
    return render(request, 'mainapp/iniciodesesion.html',{
        'title':'Inicio de sesion',
    })
def error404_2(request,exception):
    return render(request,'mainapp/404.html')


