document.querySelectorAll("button").forEach((button) => {
  button.addEventListener("click", () => {
    window.scrollTo(0, document.body.scrollHeight);
  });
});
