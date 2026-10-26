const root = document.documentElement;

// ===== Dark mode =====
document.getElementById("themeToggle").addEventListener("click", () => {
    const dark = root.classList.toggle("dark");
    try {
        localStorage.setItem("theme", dark ? "dark" : "light");
    } catch (e) {}
});

// ===== Menu mobile =====
const burger = document.getElementById("burger");
const menu = document.getElementById("mobileMenu");
burger.addEventListener("click", () => {
    const open = menu.classList.toggle("hidden") === false;
    burger.setAttribute("aria-expanded", open);
});
menu.querySelectorAll("a").forEach((a) =>
    a.addEventListener("click", () => menu.classList.add("hidden")),
);

// ===== Filter proyek =====
const filterBtns = document.querySelectorAll("[data-filter]");
const cards = document.querySelectorAll("[data-category]");
filterBtns.forEach((btn) =>
    btn.addEventListener("click", () => {
        const f = btn.dataset.filter;
        filterBtns.forEach((b) => b.setAttribute("aria-pressed", b === btn));
        cards.forEach((c) =>
            c.classList.toggle(
                "hidden",
                !(f === "all" || c.dataset.category === f),
            ),
        );
    }),
);

// ===== Animasi muncul saat scroll + isi progress bar =====
const revealEls = document.querySelectorAll(".reveal");

// jeda bertahap antar elemen bersaudara (efek berurutan)
revealEls.forEach((el) => {
    const siblings = [...el.parentElement.children].filter((c) =>
        c.classList.contains("reveal"),
    );
    el.style.animationDelay = Math.min(siblings.indexOf(el), 5) * 120 + "ms";
});

const revealObserver = new IntersectionObserver(
    (entries, obs) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add("is-visible");
            entry.target.querySelectorAll("[data-width]").forEach((bar) => {
                bar.style.width = bar.dataset.width;
            });
            obs.unobserve(entry.target);
        });
    },
    { threshold: 0.15 },
);

revealEls.forEach((el) => revealObserver.observe(el));
