#!/bin/bash
# => atuGit.sh => Atualiza o diretorio ./siteBeta em funcao de alteracoes em arquivos presentes em  /srv/siteBeta
if [ $USER = "root" ]
then
	echo "[atuGit.sh] => Usuario root !!! Ok !"

	# Listar o conteudo do diretorio siteBeta
	cd siteBeta
	LISTA_ARQ_DIR=`ls`

	# Para cada item na lista, verificar se eh arquivo ou diretorio
	for nomeItem in $LISTA_ARQ_DIR
	do
		if [ -f $nomeItem ]
		then
			QtdeDif=`diff ./$nomeItem /srv/siteBeta/$nomeItem | wc -l`
			if [ $? -eq 0 ]
			then
				if [ $QtdeDif -eq 0 ]
				then
					echo "[atuGit] => Nao ha diferenca entre os arquivos homonimos $nomeItem !!!"
				else
					echo "[atuGit] => Ha diferenca entre os arquivos homonimos $nomeItem !!!"
					cp /srv/siteBeta/$nomeItem ./$nomeItem
					echo "[atuGit] => Arquivos homonimos $nomeItem equalizados !!!"
				fi
			fi
		fi

		if [ -d $nomeItem ]
		then
			cd $nomeItem
			LISTA_ARQ=`ls`
			for nomeArq in $LISTA_ARQ
			do
				QtdeDif=`diff ./$nomeArq /srv/siteBeta/$nomeItem/$nomeArq | wc -l`
				if [ $? -eq 0 ]
				then
					if [ $QtdeDif -eq 0 ]
					then
						echo "[atuGit] => Nao ha diferenca entre os arquivos homonimos $nomeItem/$nomeArq !!!"
					else
						echo "[atuGit] => Ha diferenca entre os arquivos homonimos $nomeItem/$nomeArq !!!"
						cp /srv/siteBeta/$nomeItem/$nomeArq ./$nomeArq 
						echo "[atuGit] => Arquivos homonimos $nomeItem/$nomeArq equalizados !!!"
					fi
				fi
			done
			cd ..
		fi
	done
else
	echo "[atuGit.sh] => Usuario precisa ser root !!!"
fi
