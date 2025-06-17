```mermaid
erDiagram

    %% === MASTER DATA ===
    asset_categories {
        int id
        string name -- IT / Non-IT
    }

    asset_types {
        int id
        string name -- Laptop, Kulkas, etc
        int category_id
        string functional_group
    }

    vendors {
        int id
        string name
        string contact_person
        string phone
        string email
        string address
        string notes
    }

    users {
        int id
        string name
        string email
    }

    locations {
        int id
        string name
        string description
    }

    %% === ASSET CORE ===
    assets {
        int id
        string name
        int category_id
        int type_id
        int vendor_id
        int location_id
        int owner_id
        date purchase_date
        decimal price
        string condition
        string status -- active, storage, maintenance, faulty, disposed
        string tag_number
        date disposal_date
        boolean is_active
        text notes
        datetime created_at
        datetime updated_at
    }

    it_asset_details {
        int id
        int asset_id
        string brand
        string model
        string serial_number
        string os
        string cpu
        string ram
        string storage
        string mac_address
        string ip_address
        string license_key
        date warranty_expiry_date
    }

    nonit_asset_details {
        int id
        int asset_id
        string brand
        string model
        string material
        string dimension
        string voltage
        string power_usage
        string location_installed
        string maintenance_cycle
        date warranty_expiry_date
        string notes
    }

    %% === OPERASI ===
    asset_assignments {
        int id
        int asset_id
        int assigned_to
        date assigned_date
        date returned_date
    }

    asset_maintenances {
        int id
        int asset_id
        date maintenance_date
        string performed_by
        text description
        date next_due_date
    }

    %% === AUDIT & LIFECYCLE ===
    asset_audits {
        int id
        int asset_id
        int user_id
        string field_changed
        string old_value
        string new_value
        datetime changed_at
        text reason
    }

    asset_audit_schedules {
        int id
        int asset_id
        date scheduled_date
        string audit_method
        string status_audit -- pending, done, failed
        text audit_notes
        int audited_by
        datetime audited_at
    }

    asset_lifecycles {
        int id
        int asset_id
        string status -- previous status
        string new_status
        int from_location_id
        int to_location_id
        int changed_by
        datetime changed_at
        text note
    }

    %% === RELATIONS ===
    assets ||--o{ asset_categories : "categorized as"
    assets ||--o{ asset_types : "typed as"
    asset_types ||--o{ asset_categories : "belongs to"
    assets ||--o{ vendors : "from vendor"
    assets ||--o{ locations : "stored at"
    assets ||--o{ users : "owned by"

    it_asset_details ||--|| assets : "has IT details"
    nonit_asset_details ||--|| assets : "has Non-IT details"

    asset_assignments ||--o{ assets : "assigned"
    asset_assignments ||--o{ users : "to user"

    asset_maintenances ||--o{ assets : "maintained"

    asset_audits ||--o{ assets : "audit log"
    asset_audits ||--o{ users : "changed by"

    asset_audit_schedules ||--o{ assets : "scheduled"
    asset_audit_schedules ||--o{ users : "audited by"

    asset_lifecycles ||--o{ assets : "status moved"
    asset_lifecycles ||--o{ locations : "from"
    asset_lifecycles ||--o{ locations : "to"
    asset_lifecycles ||--o{ users : "changed by"
```
