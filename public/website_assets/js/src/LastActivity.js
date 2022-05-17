import {
  Notify,
  Ajax
} from "./module/index.js";
class LastActivity {
  static check(params) {
    Ajax.post({
      url: "../../avot/src/lib/last_activity.php",
      data: params,
      response: function(res) {
        console.log(res);
        res = JSON.parse(res);
      }
    })
  }
}
if (document.getElementById("vote")) {
  let params = {

  }
  setInterval(() => {
    LastActivity.check(params);
  }, 1000)

}