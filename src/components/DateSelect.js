import { useState } from "react";
import DatePicker, { registerLocale } from 'react-datepicker';
import 'react-datepicker/dist/react-datepicker.css'
import br from "date-fns/locale/pt-BR"
import styles from '../styles/DateSelect.module.css'

registerLocale("pt-BR", br);

function DateSelect(){
    const [selectedDate, setSelectedDate] = useState(null)
    return(
        <>
        <h3>FILTRAR POR DATA</h3>
        <DatePicker className={styles.dateStyle}
            selected={selectedDate}
            onChange={date => setSelectedDate(date)}
            dateFormat='dd/MM/yyyy'
            minDate={new Date()}
            locale="pt-BR"
        />
        </>
    );
}

export default DateSelect;