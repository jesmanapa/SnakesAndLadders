# Requisitos

Para poder ejecutar el programa es necesario tener instalado PHP en el equipo. Para realizar la instalación podemos seguir la guía proporcionada por la documentación en el siguiente enlace https://www.php.net/manual/es/install.php

# Instrucciones de uso

Una vez PHP está instalado en el equipo abriremos la consola en la ubicación donde hemos descargado los ficheros del programa y podremos ejecutar los siguientes comandos para jugar una partida:


**php SnakesAndLadders.php newGame {nombre} =>**
Nos permite crear una nueva partida indicando el nombre del jugador.

**php SnakesAndLadders.php move {movimiento} =>** 
Nos permite mover nuesto token la cantidad de casillas indicadas en el movimiento.

**php SnakesAndLadders.php setPosition {posición} =>**
Nos permite mover nuesto token a la casilla indicada en la posición.

**php SnakesAndLadders.php rollDice [resultado] =>**
Nos permite realizar una tirada con un dado de 6 caras. Si se especifica como parámetro el resultado del dado la tirada se forzará a obtener dicho resultado.
