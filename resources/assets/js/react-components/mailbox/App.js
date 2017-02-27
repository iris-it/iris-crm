import React from 'react';
import ReactDOM from "react-dom";
import $ from 'jquery';

import Sidebar from './components/Sidebar';
import EmailDetails from './components/EmailDetails';
import EmailList from './components/EmailList';

class App extends React.Component {

    constructor(args) {
        super(args);

        this.state = {
            selectedEmailId: 0,
            currentSection: 'inbox',
            emails: []
        };
    }

    openEmail(id) {
        const emails = this.state.emails;
        const index = emails.findIndex((x) => x.id === id);
        emails[index].read = 'true';
        this.setState({
            selectedEmailId: id,
            emails
        });
    }

    deleteMessage(id) {
        // Mark the message as 'deleted'
        const emails = this.state.emails;
        const index = emails.findIndex((x) => x.id === id);
        emails[index].tag = 'deleted';

        // Select the next message in the list
        let selectedEmailId = '';
        for (const email of emails) {
            if (email.tag === this.state.currentSection) {
                selectedEmailId = email.id;
                break;
            }
        }

        this.setState({
            emails,
            selectedEmailId
        });
    }

    setSidebarSection(section) {
        let selectedEmailId = this.state.selectedEmailId;
        if (section !== this.state.currentSection) {
            selectedEmailId = '';
        }

        this.setState({
            currentSection: section,
            selectedEmailId
        });
    }

    componentDidMount() {
        $.ajax({
            url: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/311743/dummy-emails.json',
            type: 'GET',
            success: (emails) => {
                let id = 0;

                for (const email of emails) {
                    email.id = id++;
                }

                this.setState({emails: emails});
            }
        });
    }

    render() {
        const currentEmail = this.state.emails.find((x) => x.id === this.state.selectedEmailId);

        return (
            <div>
                <Sidebar emails={this.props.emails} setSidebarSection={(section) => {
                    this.setSidebarSection(section);
                }}/>

                <div className="mailbox-inbox-container">

                    <EmailList
                        emails={this.state.emails.filter((x) => x.tag === this.state.currentSection)}
                        onEmailSelected={(id) => {
                            this.openEmail(id);
                        }}
                        selectedEmailId={this.state.selectedEmailId}
                        currentSection={this.state.currentSection}/>

                    <EmailDetails email={currentEmail} onDelete={(id) => {
                        this.deleteMessage(id);
                    }}/>

                </div>
            </div>
        );
    }
}

if (document.getElementById('mailbox-react')) {
    ReactDOM.render(<App />, document.getElementById('mailbox-react'));
}
