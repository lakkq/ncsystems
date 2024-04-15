const questions = document.querySelectorAll('.questions__question');
const stories = document.querySelectorAll('.story__block');
const targets = document.querySelectorAll('.targets__target');
const questionsTrigger = document.querySelector('#questionsTrigger');
const storyTrigger = document.querySelector('#storyTrigger');
const targetTrigger = document.querySelector('#targetTrigger');

const observerQuestions = new IntersectionObserver(entries => {
    let delay = 0;
    // перебор записей
    entries.forEach(entry => {
        // если элемент появился
        if (entry.isIntersecting) {
            // добавить ему CSS-класс
            questions.forEach((article) => {
                setTimeout(() => {
                    article.classList.add('showQuestions');
                }, delay);
                delay += 200;
            })
        }
    });
});

const observerTargets = new IntersectionObserver(entries => {
    let delay = 0;
    // перебор записей
    entries.forEach(entry => {
        // если элемент появился
        if (entry.isIntersecting) {
            // добавить ему CSS-класс
            targets.forEach((article) => {
                article.classList.add('showNews');
                article.style.animationDelay = `${delay}ms`;
                delay += 200;
                console.log(article);
            })
        }
    });
});

const observerStory = new IntersectionObserver(entries => {
    let delay = -1000;
    // перебор записей
    entries.forEach(entry => {
        // если элемент появился
        if (entry.isIntersecting) {
            // добавить ему CSS-класс
            stories.forEach((article) => {
                article.classList.add('showStory');
                article.style.animationDelay = `${delay}ms`;
                delay += 1000;
            })

            document.querySelectorAll('.story__arrow').forEach((article) => {
                article.classList.add('storyArrows');
                article.style.animationDelay = `${delay}ms`;
                delay += 1000;
                console.log(article)
            })
        }
    });
});

observerQuestions.observe(questionsTrigger);
observerTargets.observe(targetTrigger);
observerStory.observe(storyTrigger);