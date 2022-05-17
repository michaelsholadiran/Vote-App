class Utility {


  static showPlaceholder(container, first, last, initiall) {
    first = (first == "") ? " " : first
    last = (last == "") ? " " : last
    let initial = ""
    let x = 0;
    container.firstElementChild.innerText = `${first[0]}`;
    initiall.value = `${first[0]}`;
    for (let a in last) {
      if (first[0] == last[a]) {} else {
        initial = (first[0] + last[a]).toUpperCase()
        break;
      }
    }
    container.firstElementChild.innerText = `${initial}`;
    initiall.value = `${initial}`;
  }


  static showOriginalPlaceholder(container, initial) {
    let comb = initial.value.substring(0, 2).toUpperCase();
    container.firstElementChild.innerText = comb;
  }

}
export default Utility;