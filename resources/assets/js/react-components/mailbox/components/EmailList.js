import React from 'react';
import EmailListItem from './EmailListItem';

class EmailList extends React.Component {

    render() {

        if (this.props.emails.length === 0) {
            return (
                <div className="mailbox-email-list mailbox-empty">
                    Nothing to see here, great job!
                </div>
            );
        }

        return (
            <div className="mailbox-email-list">
                {
                    this.props.emails.map((email) => {
                        return (
                            <EmailListItem
                                key={email.id}
                                onEmailClicked={(id) => {
                                    this.props.onEmailSelected(id);
                                }}
                                email={email}
                                selected={this.props.selectedEmailId === email.id}/>
                        );
                    })
                }
            </div>
        );
    }

}

export default EmailList;