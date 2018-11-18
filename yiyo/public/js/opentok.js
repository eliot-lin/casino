$(function() {
    
    var apiKey = $('#api_key').val();
    var sessionId = $('#session_id').val();
    var token = $('#token').val();


    initializeSession();

    function handleError(error) {
        if (error) {
            alert(error.message);
        }
    }

    // Handling all of our errors here by alerting them

    function initializeSession() {
    var session = OT.initSession(apiKey, sessionId);

        // Subscribe to a newly created stream
        session.on('streamCreated', function(event) {
            session.subscribe(event.stream, 'subscriber', {
                insertMode: 'append',
                width: '100%',
                height: '100%'
            }, handleError);
        });
        // Create a publisher
        var publisher = OT.initPublisher('publisher', {
            insertMode: 'append',
            width: '100%',
            height: '100%'
        }, handleError);

        // Connect to the session
        session.connect(token, function(error) {
            // If the connection is successful, publish to the session
            if (error) {
            handleError(error);
            } else {
            session.publish(publisher, handleError);
            }
        });
    }


    
});




// replace these values with those generated in your TokBox Account
    // var apiKey = "45990512";
    // var sessionId = "2_MX40NTk5MDUxMn5-MTUwOTM2NDIyMzQ5MH5FcHo3QTloakMra3M1K2VCSVo3Sk04YU5-fg";
    // var token = "T1==cGFydG5lcl9pZD00NTk5MDUxMiZzaWc9NjMzMzgxYTk4ZjM5Y2M0NjdhOGU5ZmQwNDQ0NTk4OGFhZjBlZTczNDpzZXNzaW9uX2lkPTJfTVg0ME5UazVNRFV4TW41LU1UVXdPVE0yTkRJeU16UTVNSDVGY0hvM1FUbG9ha01yYTNNMUsyVkNTVm8zU2swNFlVNS1mZyZjcmVhdGVfdGltZT0xNTA5MzY2MTQ1Jm5vbmNlPTAuMTU2MjE0NDIxMDQ5NjYzODgmcm9sZT1wdWJsaXNoZXImZXhwaXJlX3RpbWU9MTUxMTk1ODE0MyZpbml0aWFsX2xheW91dF9jbGFzc19saXN0PQ==";
   


// console.log(apiKey);
// console.log(sessionId);
// console.log(token);
// (optional) add server code here
// (optional) add server code here
// var SERVER_BASE_URL = 'https://opentokyywtesting.herokuapp.com/';
// fetch(SERVER_BASE_URL + '/session').then(function(res) {
//   return res.json()
// }).then(function(res) {
//     console.log(res);
//     apiKey = res.apiKey;
//     sessionId = res.sessionId;
//     token = res.token;
//     initializeSession();
// }).catch(handleError);

// // console.log(apiKey);
// // console.log(sessionID);
// // console.log(token);

