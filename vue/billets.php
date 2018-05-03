<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Billet simple pour l'Alaska </title>
        <link type="text/css" href="assets/css/style.css" rel="stylesheet" /> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    </head>

    <body>
        
        {%  if connected=="oui"  %}
            <h3><a href='index.php?section=logout'>Deconnexion</a></h3>
        {% endif %}
         <h3><a href='index.php?section=login'>Admin</a></h3>

        
        
        <h1>Billet simple pour l'Alaska</h1>
        <p> Découvrez le nouveau roman de l'acteur et écrivain Jean Forteroche, à mesure qu'il se construit.</p>
        <p>Derniers épisodes :</p>



{% for billet in billets %} 

<div class="news">
    <h3>
        {{ billet.getTitre }}
        <em>le {{ billet.getDateCreation }}</em>
    </h3>

    <div>
        {{ billet.getContenu }}
        <br />
        <em><a href="index.php?section=commentaires&billet={{ billet.getId }}">Commentaires</a></em>
    </div>
</div>

{% endfor %}

</body>
</html>