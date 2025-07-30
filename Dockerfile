# Usa a mesma imagem base oficial da AWS para PHP no Lambda (versão 8.2).
FROM public.ecr.aws/docker/library/php:8.2-fpm

# Define o diretório de trabalho dentro do contêiner para o diretório de tarefa do Lambda.
WORKDIR /var/task

# Copia apenas o arquivo app.php (este é o nosso código minimalista)
COPY app.php /var/task/app.php

# Garante que o PHP-FPM escute no endereço 9000, que é a porta padrão que o Lambda espera.
COPY php-fpm.conf /etc/php/8.2/fpm/pool.d/www.conf

# CMD é o comando que será executado quando o contêiner iniciar.
CMD ["php-fpm"]
