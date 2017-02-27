import React from 'react';
import {getPrettyDate} from '../helpers/time';

class EmailListItem extends React.Component {
    render() {

        let classes = "mailbox-email-item";

        if (this.props.selected) {
            classes += " mailbox-selected";
        }

        return (
            <div onClick={() => {
                this.props.onEmailClicked(this.props.email.id);
            }} className={classes}>

                <div className="mailbox-email-item__unread-dot" data-read={this.props.email.read}></div>
                <div className="mailbox-email-item__subject truncate">{this.props.email.subject}</div>
                <div className="mailbox-email-item__details">
                    <span className="mailbox-email-item__from truncate">{this.props.email.from}</span>
                    <span className="mailbox-email-item__time truncate">{getPrettyDate(this.props.email.time)}</span>
                </div>
            </div>
        );
    }

}

export default EmailListItem;