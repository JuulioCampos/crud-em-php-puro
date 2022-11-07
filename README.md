# crud-em-php-puro
Pequeno crud utilizando POO e DAO

Foi utilizado PHP no back, modelo MVC

Foi criado esquema de rotas, porém os endpoints estão para receber {HOST}/
se adicionado outro caminho, poderá ocorrer falhas
Se for passado parametros inexistentes, será redirecionado para /home

Foi utilizado endpoints para criação de apis, os cruds são realizados por ajax utilizando Axios

ENDPOINTS

<ul>
    <li>GET: /list-usuario</li>
    <li>PUT: /update-usuario</li>
    <li>DELETE: /delete-usuario</li>
    <li>POST: /create-usuario</li>
</ul>


para subir o banco pelo terminal
mysql -u{usuario banco} -p{sua senha} < {nome da tabela criada}