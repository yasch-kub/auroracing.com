$(document).ready(function() {
    var chat = new ChatEngine('#messageForm', '#messageBox')
});

function ChatEngine(messageForm, messageBox) {
    this.form = $(messageForm);
    this.sendUrl = 'chat/1/connect';//this.form.attr('action');
    this.messageBox = $(messageBox);

    this.initialize();
}

ChatEngine.prototype.initialize = function() {
    this.connect();
    this.form.submit($.proxy(this.sendMessage, this));
};

ChatEngine.prototype.connect = function() {
    var server = new EventSource('chat/1/connect');
    server.onmessage = function() {
        console.log('sfsdfsdf');
    }
    server.onopen = function() {
        console.log('Connected');
    };
    server.onerror = function() {
        if (this.readyState == EventSource.CONNECTING)
            console.log("Disconnect. Reconnecting...");
        else
            console.log("Error, state: " + this.readyState);
    };
};

ChatEngine.prototype.sendMessage = function(event) {
    event.preventDefault();
    console.log('Send message...');
    $.post(this.sendUrl, this.form.serialize() , $.proxy(this.success, this));
};

ChatEngine.prototype.success = function(response) {
    console.log(response.data);
};
