// Show element when clicked

function toggleClass(className) {
  if (className.classList.contains("d-none")) {
    className.classList.add("d-block");
    className.classList.remove("d-none");
  } else if (className.classList.contains("d-block")) {
    className.classList.remove("d-block");
    className.classList.add("d-none");
  } else if (className.classList.contains("visible")) {
    className.classList.remove("visible", "animate__fadeInDown");
    className.classList.add("visible", "animate__fadeOutDown");
    setTimeout(() => {
      className.classList.remove("visible", "animate__fadeOutDown");
      className.classList.add("invisible");
    }, 999);
  } else if (className.classList.contains("invisible")) {
    className.classList.remove("invisible");
    className.classList.add("visible", "animate__fadeInDown");
  }
}
function separateClass(array) {
  for (var i = 0; i < array.length; i++) {
    className = array[i];
    toggleClass(className);
    console.log(array[i]);
  }
}

function showElement(AttributeValue) {
  if (document.getElementById(AttributeValue) != null) {
    className = document.getElementById(AttributeValue);
    console.log(className);
    toggleClass(className);
  } else {
    className = document.getElementsByClassName(AttributeValue);
    console.log(className);
    separateClass(className);
  }
}
