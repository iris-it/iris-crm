import React, {Component} from 'react';
import ReactDOM from 'react-dom';

class Mailbox extends Component {
    render() {
        return (
            <div>
                <h1>Cool, it's working Mailbox</h1>
            </div>
        );
    }
}

export default Mailbox;

// We only want to try to render our component on pages that have a div with an ID
// of "example"; otherwise, we will see an error in our console
if (document.getElementById('mailbox-react')) {
    ReactDOM.render(<Mailbox />, document.getElementById('mailbox-react'));
}