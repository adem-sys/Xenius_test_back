<!-- resources/views/pdf_template.blade.php -->

<html>
<head>
    <style>
        /* Ajoutez votre style CSS pour le PDF ici */
    </style>
</head>
<body>
    <h1>CV</h1>
    <p>User ID: {{ $user_id }}</p>
    <p>Experience: {{ $experience }}</p>
    <p>Compétences: {{ $competences }}</p>
    <p>Formation: {{ $formation }}</p>
    <p>Autres Informations: {{ $autres_informations }}</p>
</body>
</html>
