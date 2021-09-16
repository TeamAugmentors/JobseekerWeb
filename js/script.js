// =================================================
// team page Animation
// =================================================
if (document.URL.includes("team.html")) {
  new fullpage('#team-fullpage', {
    anchors: ['intro', 'sanjid', 'atikur', 'tanim'],
    navigation: true,
    navigationTooltips: ['Intro', 'Sanjid Islam Chowdhury', 'Md. Atikur Rahman', 'Ahmed Saad Tanim'],
  });

  let i = 0;
  let text = 'Meet the team.';
  let textSpeed = 100;

  function typeWriter() {
    if (i < text.length) {
      document.querySelector("#team--hero-header").innerHTML += text.charAt(i++);
      setTimeout(typeWriter, textSpeed);
    }
  }
  typeWriter();
}
else if (document.URL.includes("signin.html")) {
  // =====================Sign inpage back button===============================
  const signInBackButton = document.querySelector(".signin-page .arrow-left");
  signInBackButton.addEventListener('click', () => {
    history.back();
  });
}
else if (document.URL.includes("signup.html")) {
  // =====================Sign inSign up page back button===============================
  const signInBackButton = document.querySelector(".signup-page .arrow-left");
  signInBackButton.addEventListener('click', () => {
    history.back();
  });
}
else if (document.URL.includes("explore.html")) {
  const catagoryIconTriangle = document.querySelector(".catagory-div .icon-triangle");
  const catagoryItems = document.querySelector(".explore-container .left .choose-catagory");
  const budgetIconTriangle = document.querySelector(".budget-div .icon-triangle");
  const budgetContainer = document.querySelector(".budget-div .content");
  // console.log(budgetContainer);
  isToggleCatagory = false;
  isToggleBudget = false;

  budgetIconTriangle.addEventListener('click', () => {
    if (!isToggleBudget) {
      budgetIconTriangle.style.transform = 'rotate(90deg)';
      budgetContainer.style.maxHeight = '0';
      isToggleBudget = true;
    } else {
      budgetIconTriangle.style.transform = 'rotate(0deg)';
      budgetContainer.style.maxHeight = budgetContainer.scrollHeight + "px";
      isToggleBudget = false;
    }
  })

  catagoryIconTriangle.addEventListener("click", () => {
    if (!isToggleCatagory) {
      catagoryIconTriangle.style.transform = 'rotate(90deg)';
      catagoryItems.style.maxHeight = '0';
      isToggleCatagory = true;
    } else {
      catagoryIconTriangle.style.transform = 'rotate(0deg)';
      catagoryItems.style.maxHeight = catagoryItems.scrollHeight + "px";
      isToggleCatagory = false;
    }
  })
}