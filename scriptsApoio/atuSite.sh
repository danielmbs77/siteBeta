#!/bin/bash
# => atuSite.sh => Copia o diretorio ./siteBeta para o path /srv/siteBeta
if [ $USER = "root" ]
then
	echo "[atuSite.sh] => Usuario root !!! Ok !"

	# SE diretorio /srv/siteBeta existe, apaga-lo
	if [ -e "/srv/siteBeta" -a -d "/srv/siteBeta" ]
	then
		echo "[atuSite.sh] => Diretorio /srv/siteBeta existente, apagando-o..."
		rm -rf /srv/siteBeta
		if [ $? -eq 0 ]
		then
			echo "[atuSite.sh] => [Sucesso] => Diretorio /srv/siteBeta existente, removido com sucesso..."
		else
			echo "[atuSite.sh] => [Falha] => Diretorio /srv/siteBeta existente, nao pode ser apagado..."
		fi
	else
		echo "[atuSite.sh] => Diretorio /srv/siteBeta inexistente !!!"
	fi

	# Verificar a existencia do diretorio procedente do GitHub em workspace
	if [ -e "siteBeta" -a -d "siteBeta" ]
	then
		echo "[atuSite.sh] => Diretorio ./siteBeta existente !!!"
		echo "[atuSite.sh] => Copiando ./siteBeta -> /srv/ !!!"
		cp -r ./siteBeta /srv/
		chmod -R ugo+rw /srv/siteBeta 
		echo "[atuSite.sh] => /srv/siteBeta atualizado com sucesso !!!"
	else
		echo "[atuSite.sh] => [Falha] => Diretorio ./siteBeta inexistente !!!"
	fi
else
	echo "[atuSite.sh] => Usuario precisa ser root !!!"
fi
