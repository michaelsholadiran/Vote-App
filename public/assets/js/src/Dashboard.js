import {
  Notify,
  Element,
  Form,
  Validator,
  Utility,
  Modal,
  imageUploader,
  Ajax
} from "./module/index.js";
class Dashboard {
  static get(count, card, params) {
    let cnt = count.dataset.count;
    let q = Ajax.get({
      url: "../src/Lib/counts.php",
      data: params,
      response: function(res) {
        res = JSON.parse(res);
        if (cnt != res) {
          let r = res.length - count;
          cnt = res;
          count.innerHTML = `${res}`;
        }
      }
    })
  }
}

if (document.getElementById("dashboard")) {
  const cards = document.querySelectorAll(".wc-item");
  cards.forEach((j) => {
    let count = j.lastElementChild;
    let card = j.lastElementChild;
    let q = j.lastElementChild.id;
    setInterval(() => {
      Dashboard.get(count, card, {
        "data": q
      });
    }, 1000);
  });


}