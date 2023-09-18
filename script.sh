#l/bin/bash
#18/04/2023

clear
echo "Menu"
echo "----"

salir="1"

while salir=="1"
do
echo "1. Control de version"
echo "2. Configurar usuario, email, password"
echo "3. Realizar add"
echo "4. Realizar commit sobre el ultimo"
echo "5. Configurar repositorio remoto"
echo "6. Cambiar nombre de la rama principal de Master a main"
echo "7. Subir repositorio a remoto"
echo "8. Ver commits"
echo "9. Salir"

op=""
opp=""

ruta="https://github.com/marcos24ps/ejercicios_laravel_casa.git"
echo
read -p "Escriba su opcion (1-9)" op

case $op in
1)
	echo "1. Control de version"
	git init
	read -rsp $"\nPress any key to continue.."
;;
2)
	echo "2. Configurar usuario, email, password"
	git config global.user.name "marcos24ps"
	git config global.user.email "marcos24ps@gmail.com"
	git config global.user.password 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
	read -rsp $"\nPress any key to continue.."
;;
3)
	echo "3. Realizar add"
	git add .
	read -rsp $"\nPresss any key to continue.."
;;
4)
	echo "4. Realizar commit sobre el ultimo"
	read -p "Introduzca el nombre para el commit" opp
	git commit -m "$opp"
	read -rsp $"\nPress any key to continue.."
;;
5)
	echo "5. Configurar repositorio remoto"
	git remote add origin $ruta
	read -rsp $"\nPress any key to continue.."
;;
6)
	echo "6. Cambiar nombre de la rama principal de Master a main"
	git branch -M Master
	read -rsp $"\nPress any key to continue.."
;;
7)
	echo "7. Subir repositorio a remoto"
	git push -u -f $ruta
	read -rsp $"\nPress any key to continue.."
;;
8)
	echo "8. Mostrar commits"
	git log --oneline
	read -rsp $"\nPress any key to continue.."
;;
9)
	echo "9. Salir"
	echo "Gracias por su visita"
	read -rsp $"\nPress any key to continue.."
	exit
;;
*)
	echo "Opcion incorrecta";;
	esac
clear
done