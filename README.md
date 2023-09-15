<h4>Resumo</h4>

<p>Trata-se de uma API desenvolvida com Laravel onde há um CRUD de bandas.</p>

<h4>Rotas</h4>

<p><b>/v1/bands/all (GET)</b>: lista todas as bandas cadastradas no banco de dados</p>

<p><b>/v1/bands/id/:bandId (GET)</b>: retorna um objeto com as informações da banda através do ID (do tipo UUID) que é passado como parâmetro na URL.</p>

<p><b>/v1/bands/gender/:bandGender (GET)</b>: retorna um objeto com uma lista de bandas do gênero (do tipo String) que é passado como parâmetro na URL</p>

<p><b>/v1/bands/save (POST)</b>: insere uma nova banda no banco de dados</p>

<p>body (JSON):</p>

```
{
    "name": "band name" (string),
    "gender": "band gender" (string),
}
```

<p><b>/v1/bands/update/:bandId (PUT)</b>: altera os dados de uma banda cujo ID (UUID) é passado como parâmetro na URL.</p>

<p>body (JSON):</p>

```
{
    "name": "band name" (string),
    "gender": "band gender" (string),
}
```

<p><b>/v1/bands/delete/:bandId (DELETE)</b>: remove uma banda cujo ID (UUID) é passado como parâmetro na URL.</p>
