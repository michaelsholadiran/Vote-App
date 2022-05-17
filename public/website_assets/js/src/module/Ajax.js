class Ajax {
  static post(params = {}) {
    let fields = Object.keys(params.data);
    let data = new FormData();
    for (let field of fields) {
      data.append(field, params.data[field]);
    }
    const xhr = window.XMLHttpRequest ?
      new XMLHttpRequest() :
      new ActiveXObject("Microsoft.XMLHTTP");
    xhr.onreadystatechange = () => {
      if (xhr.status === 200 && xhr.readyState === 4) {
        const res = xhr.responseText;
        params.response(res);
      }
    };
    xhr.open("POST", `./${params.url}`, true);
    xhr.send(data);
  };
  static get(params = {}) {
    let fields = Object.keys(params.data);

    let passedParam = fields
      .map(function(k) {
        return encodeURIComponent(k) + "=" + encodeURIComponent(params.data[k]);
      })
      .join("&");

    let param = "?" + passedParam;

    const xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
    xhr.onreadystatechange = () => {
      if (xhr.status === 200 && xhr.readyState === 4) {
        const res = xhr.responseText;
        params.response(res);
      }
    };
    xhr.open("GET", `./${params.url}${param}`, true);
    xhr.send();
  }
}
export default Ajax;