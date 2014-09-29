SELECT `MainTable`.`GroupID`,
    `MainTable`.`LeaderLastName`,
    `MainTable`.`LeaderFirstName`,
    `MainTable`.`Institution`,
    `MainTable`.`PositionInInstitution`,
    `MainTable`.`LeaderAge`,
    `MainTable`.`IsItMale`,
    `MainTable`.`PAP Member`,
    `MainTable`.`IsActive`
FROM `MOVE`.`MainTable`;

SELECT `Community`.`CommunityID`,
    `Community`.`GroupID`,
    `Community`.`Region`,
    `Community`.`City`,
    `Community`.`Barangay`,
    `Community`.`IsActive`
FROM `MOVE`.`Community`;

SELECT `Training`.`TrainingID`,
    `Training`.`GroupID`,
    `Training`.`CommunityID`,
    `Training`.`PFA`,
    `Training`.`GriefCounseling`,
    `Training`.`Debriefing`,
    `Training`.`Counseling`,
    `Training`.`Other`,
    `Training`.`IsActive`
FROM `MOVE`.`Training`;





SELECT `Intervention`.`InterventionID`,
    `Intervention`.`GroupID`,
    `Intervention`.`CommunityID`,
    `Intervention`.`PFA`,
    `Intervention`.`GriefCounseling`,
    `Intervention`.`Debriefing`,
    `Intervention`.`Counseling`,
    `Intervention`.`Therapy`,
    `Intervention`.`Other`,
    `Intervention`.`IsActive`
FROM `MOVE`.`Intervention`;






