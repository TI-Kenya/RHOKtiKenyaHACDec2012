/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package com.WhistleBlower;

import java.beans.PropertyChangeListener;
import java.beans.PropertyChangeSupport;
import java.io.Serializable;
import java.util.Date;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Lob;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;
import javax.persistence.Transient;

/**
 *
 * @author JOE
 */
@Entity
@Table(name = "health", catalog = "whistle_blower", schema = "")
@NamedQueries({@NamedQuery(name = "Health.findAll", query = "SELECT h FROM Health h"), @NamedQuery(name = "Health.findById", query = "SELECT h FROM Health h WHERE h.id = :id"), @NamedQuery(name = "Health.findByDate", query = "SELECT h FROM Health h WHERE h.date = :date")})
public class Health implements Serializable {
    @Transient
    private PropertyChangeSupport changeSupport = new PropertyChangeSupport(this);
    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "id")
    private Integer id;
    @Basic(optional = false)
    @Lob
    @Column(name = "Source_area")
    private String sourcearea;
    @Basic(optional = false)
    @Lob
    @Column(name = "Message")
    private String message;
    @Basic(optional = false)
    @Column(name = "Date")
    @Temporal(TemporalType.TIMESTAMP)
    private Date date;

    public Health() {
    }

    public Health(Integer id) {
        this.id = id;
    }

    public Health(Integer id, String sourcearea, String message, Date date) {
        this.id = id;
        this.sourcearea = sourcearea;
        this.message = message;
        this.date = date;
    }

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        Integer oldId = this.id;
        this.id = id;
        changeSupport.firePropertyChange("id", oldId, id);
    }

    public String getSourcearea() {
        return sourcearea;
    }

    public void setSourcearea(String sourcearea) {
        String oldSourcearea = this.sourcearea;
        this.sourcearea = sourcearea;
        changeSupport.firePropertyChange("sourcearea", oldSourcearea, sourcearea);
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        String oldMessage = this.message;
        this.message = message;
        changeSupport.firePropertyChange("message", oldMessage, message);
    }

    public Date getDate() {
        return date;
    }

    public void setDate(Date date) {
        Date oldDate = this.date;
        this.date = date;
        changeSupport.firePropertyChange("date", oldDate, date);
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (id != null ? id.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Health)) {
            return false;
        }
        Health other = (Health) object;
        if ((this.id == null && other.id != null) || (this.id != null && !this.id.equals(other.id))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "com.WhistleBlower.Health[id=" + id + "]";
    }

    public void addPropertyChangeListener(PropertyChangeListener listener) {
        changeSupport.addPropertyChangeListener(listener);
    }

    public void removePropertyChangeListener(PropertyChangeListener listener) {
        changeSupport.removePropertyChangeListener(listener);
    }

}
