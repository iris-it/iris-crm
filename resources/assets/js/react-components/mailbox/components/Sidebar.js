import React from 'react';

class Sidebar extends React.Component {

    unreadCount() {
        return this.props.emails.reduce((previous, msg) => {
            if (msg.read !== "true") {
                return previous + 1;
            }
            else {
                return previous;
            }
        });
    }

    deletedCount() {
        return this.props.emails.reduce((previous, msg) => {
            if (msg.tag === "deleted") {
                return previous + 1;
            }
            else {
                return previous;
            }
        });
    }

    render() {
        return (
            <div id="mailbox-sidebar">
                <div className="mailbox-sidebar__compose">
                    <a href="#" className="btn compose">
                        Compose <span className="fa fa-pencil"></span>
                    </a>
                </div>
                <ul className="mailbox-sidebar__inboxes">
                    <li onClick={() => {
                        this.props.setSidebarSection('inbox');
                    }}>
                        <a>
                            <span className="fa fa-inbox"></span> Inbox
                            <span className="c">{this.unreadCount}</span>
                        </a>
                    </li>
                    <li onClick={() => {
                        this.props.setSidebarSection('sent');
                    }}>
                        <a>
                            <span className="fa fa-paper-plane"></span> Sent
                            <span className="item-count">0</span>
                        </a>
                    </li>
                    <li onClick={() => {
                        this.props.setSidebarSection('drafts');
                    }}>
                        <a>
                            <span className="fa fa-pencil-square-o"></span> Drafts
                            <span className="item-count">0</span>
                        </a>
                    </li>
                    <li onClick={() => {
                        this.props.setSidebarSection('deleted');
                    }}>
                        <a>
                            <span className="fa fa-trash-o"></span> Trash
                            <span className="item-count">{this.deletedCount}</span>
                        </a>
                    </li>
                </ul>
            </div>
        );
    }
}

export default Sidebar;