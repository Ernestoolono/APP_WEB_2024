from django.shortcuts import render, redirect
#from django.contrib.auth.forms import UserCreationForm
from mainapp.forms import RegisterForm
from django.contrib import messages
from django.contrib.auth import authenticate, login, logout
from django.contrib.auth.decorators import login_required

# Create your views here.

def index(requets):
    return render(requets,'mainapp/index.html',{
        'title':'Inicio',
        'content':'.::Bienvenido a mi Pagina de Inicio::..'
    })

@login_required(login_url='inicio')
def about(requets):
    return render(requets,'mainapp/about.html',{
        'title':'acerca de...',
        'content':'.::Somos un equipo de SW multiplataforma con Django::..'
    })

@login_required(login_url='inicio')
def mision(requets):
    return render(requets,'mainapp/mision.html',{
        'title':'Mision',
        'content':'.:: Mision de mision::..'
    })

@login_required(login_url='inicio')
def vision(requets):
    return render(requets,'mainapp/vision.html',{
        'title':'Vision',
        'content':'.::Vision de vision::..'
    })

# Redirijir a pagina incio con error404 1er forma
def error404(request,exception):
    return redirect('inicio')

# Redirijir a pagina inicio con error404 2da forma

def error404_2(request,exception):
    return render(request,'mainapp/404.html')


def registro(requets):
    if requets.user.is_authenticated:
        return redirect('inicio')
    else:
        register_form=RegisterForm()

        if requets.method == "POST":
            register_form=RegisterForm(requets.POST)

            if register_form.is_valid():
                register_form.save()
                messages.success(requets,"¡Registro Éxitoso")
                return redirect('inicio')

        return render(requets,'users/registro.html',{
        'title':'Registro de Usuario',
        'register_form': register_form
        })


def iniciodesesion(requets):
    if requets.user.is_authenticated:
        return redirect('inicio')
    else:
        if requets.method == "POST":
            username=requets.POST.get('username')
            password=requets.POST.get('password')
            
            user=authenticate(requets, username=username, password=password)

            if user is not None:
                login(requets,user)
                messages.success(requets,"¡ Bienvenido al inicio de Sesión !")
                return redirect('inicio')
            else:
                messages.warning(requets,"No es posible iniciar sesión verifica tus credenciales de acceso")

        return render(requets,'users/iniciodesesion.html',{
        'title':'Inicio de Sesion',
        'content':'.::Formulario de inicio de sesion::..'
    })

def logout_user(request):
    logout(request)
    return redirect('inicio')