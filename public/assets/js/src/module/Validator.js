import Element from './Element.js';
class Validator {
  passed = false;
  error = [];
  addError(errorType, errorMessage) {
    this.error.push({
      [errorType]: errorMessage
    });
  }
  validate(a) {
    a.forEach((item) => {
      let elementIds = Object.keys(item);
      elementIds.forEach((elementId) => {
        item[elementId].forEach((rule) => {
          let ruleKeys = Object.keys(rule)
          ruleKeys.forEach((ruleKey) => {
            let targetElement = document.getElementById(elementId);
            let ruleValue = rule[ruleKey]
            let name = (rule.name != undefined) ? rule.name : "";
            if (ruleKey == "required" && ruleValue == true && targetElement.value == "") {
              this.addError(`err$${elementId}`, `required`)
            } else {
              switch (ruleKey) {
                case "alpha":
                  if (!/^[a-zA-Z]+$/.test(targetElement.value)) {
                    this.addError(`err$${elementId}`, `Alphabets only`)
                  }
                  break;
                case "min":
                  if (targetElement.value.length < ruleValue) {
                    this.addError(`err$${elementId}`, `Too short`)

                  }
                  break;
                case "max":
                  if (targetElement.value.length > ruleValue) {
                    this.addError(`err$${elementId}`, `Too Long`)

                  }
                  break;
                case "numeric":
                  if (isNaN(targetElement.value)) {
                    this.addError(`err$${elementId}`, `Invalid`)
                  }
                  break;
                case "email":
                  if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(targetElement.value)) {
                    this.addError(`err$${elementId}`, `Invalid email`)
                  }
                  break;
                case "type":
                  if (ruleValue == "checkbox" && targetElement.checked == false) {
                    this.addError(`err$${elementId}`, `This have to be acknownledge`)
                  }
                  break;
              }
            }
          })
        })
      })
    });
    if (this.errors().length > 0) {
      return this.errors();
    } else {
      return this.passed = true;
    }
  }
  isPassed = () => {
    return this.passed;
  }
  errors = () => {
    return this.error;
  }
}
export default Validator;