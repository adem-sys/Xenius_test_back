<html>
<head>
    <style>
        /* Ajoutez ici votre style CSS pour le PDF */
    </style>
</head>
<body>
    <h1>Curriculum Vitae</h1>
    <p>Expérience: {{ $cv->experience }}</p>
    <p>Compétences: {{ $cv->competences }}</p>
    <p>formation: {{ $cv->formation }}</p>
</body>
</html>