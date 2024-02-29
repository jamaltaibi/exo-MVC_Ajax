fetch('http/get.php')
.then(response => response.json())
.then(data => {
    console.log(data);
})

document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('.myForm');

    forms.forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Empêcher la soumission du formulaire par défaut

            const formData = new FormData(form);

            const idTache = form.getAttribute('data-id');
            formData.append('idtache', idTache);

            const nouvelleTacheInput = form.querySelector('.nouvelleTache');

            if (nouvelleTacheInput.value.trim() === '') {
                event.preventDefault();
    
                alert("Veuillez entrer une nouvelle tâche avant de soumettre le formulaire.");
            }else{
                fetch('http/post.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    console.log(response);
                    if (!response.ok) {
                        throw new Error('Erreur lors de la requête.');
                    }
                    if (response.ok){
                        window.location.href = 'index.php?page=accueil';
                        console.log('data ajoutée avec succès');
                    }
                })
                .catch(error => {
                        console.error('Erreur:', error);
                })
            }
        });
    });
});
