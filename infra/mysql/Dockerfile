FROM mysql:8.0

ENV MYSQL_DATABASE=laravel_event_test \
    MYSQL_USER=laravel_user \
    MYSQL_PASSWORD=laravel_pass \
    MYSQL_ROOT_PASSWORD=root \
    TZ=Asia/Tokyo

COPY ./my.cnf /etc/mysql/conf.d/my.cnf
RUN chmod 644 /etc/my.cnf