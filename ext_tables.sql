#
# SQL definition of database tables for extension 'ucph_ce_socialmedia'
#
--
-- Table structure for table 'tt_content'
--
CREATE TABLE tt_content (
    tx_ucph_ce_socialmedia_item int(11) unsigned DEFAULT '0',
);

--
-- Table structure for table 'tx_ucph_ce_socialmedia_item'
--
CREATE TABLE tx_ucph_ce_socialmedia_item (
    tt_content int(11) unsigned DEFAULT '0',
    socialmedia_name varchar(255) DEFAULT '' NOT NULL,
    socialmedia_link varchar(1024) DEFAULT '' NOT NULL,
);