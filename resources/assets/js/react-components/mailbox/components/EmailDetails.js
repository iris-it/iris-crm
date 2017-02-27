import React from 'react';
import {getPrettyTime, getPrettyDate} from '../helpers/time';

class EmailDetails extends React.Component {

    render() {
        if (!this.props.email) {
            return (
                <div className="mailbox-email-content mailbox-empty"></div>
            );
        }

        const date = `${getPrettyDate(this.props.email.time)} · ${getPrettyTime(this.props.email.time)}`;

        const getDeleteButton = () => {
            if (this.props.email.tag !== 'deleted') {
                return <span onClick={() => {
                    this.props.onDelete(this.props.email.id);
                }} className="mailbox-delete-btn fa fa-trash-o"/>;
            }
            return undefined;
        };

        return (
            <div className="mailbox-email-content">
                <div className="mailbox-email-content__header">
                    <h3 className="mailbox-email-content__subject">{this.props.email.subject}</h3>
                    {getDeleteButton()}
                    <div className="mailbox-email-content__time">{date}</div>
                    <div className="mailbox-email-content__from">{this.props.email.from}</div>
                </div>
                <div className="mailbox-email-content__message">{this.props.email.message}</div>
            </div>
        );
    }
}

export default EmailDetails;