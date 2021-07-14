const cartAction = actionName => {
  return new Promise((resolve, reject) => {
    const
      formData = new FormData(),
      request = new XMLHttpRequest()

    formData.append("action", actionName)
    request.open('POST', data.ajax, true)

    request.onload = function(){
      if (this.status >= 200 && this.status < 400) {
        resolve(this.response)
      }
    }

    request.onerror = function(){
      reject(this.response)
    };

    request.send(formData)
  })
}