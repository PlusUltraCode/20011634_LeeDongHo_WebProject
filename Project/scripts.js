// scripts.js

document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("search");
    searchInput.addEventListener("input", function() {
        const query = this.value.toLowerCase();
        const articles = document.querySelectorAll(".article");
        articles.forEach(article => {
            const title = article.querySelector("h3").textContent.toLowerCase();
            if (title.includes(query)) {
                article.style.display = "";
            } else {
                article.style.display = "none";
            }
        });
    });

    const likeButtons = document.querySelectorAll("button");
    likeButtons.forEach(button => {
        button.addEventListener("click", function() {
            alert("Feature not implemented yet.");
        });
    });
});

// scripts.js

document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("search");
    searchInput.addEventListener("input", function() {
        const query = this.value.toLowerCase();
        const items = document.querySelectorAll(".article, .workout, .diet");
        items.forEach(item => {
            const title = item.querySelector("h3").textContent.toLowerCase();
            if (title.includes(query)) {
                item.style.display = "";
            } else {
                item.style.display = "none";
            }
        });
    });

    const likeButtons = document.querySelectorAll(".like-btn");
    likeButtons.forEach(button => {
        button.addEventListener("click", function() {
            alert("Feature not implemented yet.");
        });
    });

    const commentButtons = document.querySelectorAll(".comment-btn");
    commentButtons.forEach(button => {
        button.addEventListener("click", function() {
            alert("Feature not implemented yet.");
        });
    });

    const shareButtons = document.querySelectorAll(".share-btn");
    shareButtons.forEach(button => {
        button.addEventListener("click", function() {
            alert("Feature not implemented yet.");
        });
    });
});



document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("search");
    searchInput.addEventListener("input", function() {
        const query = this.value.toLowerCase();
        const items = document.querySelectorAll(".article, .workout, .diet");
        items.forEach(item => {
            const title = item.querySelector("h3").textContent.toLowerCase();
            if (title.includes(query)) {
                item.style.display = "";
            } else {
                item.style.display = "none";
            }
        });
    });

    const likeButtons = document.querySelectorAll(".like-btn");
    likeButtons.forEach(button => {
        button.addEventListener("click", function() {
            const contentId = this.parentElement.dataset.id;
            const contentType = this.parentElement.dataset.type;

            fetch('like.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    content_id: contentId,
                    content_type: contentType
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert('Liked!');
                } else {
                    alert(data.message);
                }
            });
        });
    });

    const commentButtons = document.querySelectorAll(".comment-btn");
    commentButtons.forEach(button => {
        button.addEventListener("click", function() {
            const contentId = this.parentElement.dataset.id;
            const contentType = this.parentElement.dataset.type;
            const comment = prompt("Enter your comment:");

            if (comment) {
                fetch('comment.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        content_id: contentId,
                        content_type: contentType,
                        comment: comment
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        alert('Commented!');
                    } else {
                        alert(data.message);
                    }
                });
            }
        });
    });

    const shareButtons = document.querySelectorAll(".share-btn");
    shareButtons.forEach(button => {
        button.addEventListener("click", function() {
            alert("Feature not implemented yet.");
        });
    });
});