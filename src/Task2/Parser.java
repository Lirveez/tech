package Task2;
        import org.json.*;
        import java.io.*;
        import java.util.*;

/**
 * Created by Lirveez on 30.04.2018.
 */
public class Parser {
    public static void main(String[] args) throws FileNotFoundException, JSONException {
        String path =  "src/Task2/E05_aanderaa_all_1769_d432_5004.json";
        FileReader file = new FileReader(path);
        JSONTokener Tokener = new JSONTokener(file);
        JSONObject obj = new JSONObject(Tokener);
        JSONObject table = (JSONObject) obj.get("table");
        JSONArray columnNames = table.getJSONArray("columnNames");
        JSONArray columnTypes = table.getJSONArray("columnTypes");
        JSONArray rows = table.getJSONArray("rows");
        ArrayList<Integer> choice = new ArrayList<Integer>();
        for (int i = 0; i < columnTypes.length(); i++){
            if(columnTypes.get(i).toString().equals("float") && !columnNames.get(i).toString().equals("longitude") &&
                    !columnNames.get(i).toString().equals("latitude") && !columnNames.get(i).toString().equals("depth")){
                choice.add(i);
            }
        }
        for (int num: choice) {
            if(columnNames.get(num).toString().equals("current_speed")||
                    columnNames.get(num).toString().equals("temperature")||
                columnNames.get(num).toString().equals("salinity")) {
                System.out.println("\"" + columnNames.get(num) + "\"" + ":{");
                getData(rows, columnNames, num);
                System.out.println("},");
            }
        }


    }

    public static void getData(JSONArray rows, JSONArray columnNames, int num) throws JSONException {
        float average = 0;
        String row = String.valueOf(rows.get(0));
        String mas[] = row.split(",");
        float min= Float.valueOf(mas[num]);
        float max= Float.valueOf(mas[num]);

        ArrayList<Float> averageMass = new ArrayList<Float>();
        ArrayList<String> dates = new ArrayList<>();
        int dateindx = 0;
        for (int i = 0; i< columnNames.length();i++){
            row = String.valueOf(columnNames.get(i));
            if (row.equals("time")){
                dateindx = i;
                break;
            }
        }
        String min_time=String.valueOf(mas[dateindx])
                ,max_time=String.valueOf(mas[dateindx]);
        for (int i = 0; i < rows.length(); i++){
            row = String.valueOf(rows.get(i));
            String mass[] = row.split(",");
            dates.add(String.valueOf(mass[dateindx]));
            if(check(row,columnNames,num)) {
                if (Float.valueOf(mass[num])>max){
                    max = Float.valueOf(mass[num]);
                    max_time = String.valueOf(mass[dateindx]);
                }
                if (Float.valueOf(mass[num])<min){
                    min = Float.valueOf(mass[num]);
                    min_time = String.valueOf(mass[dateindx]);
                }
                averageMass.add(Float.valueOf(mass[num]));
                average = average + averageMass.get(averageMass.size()-1);
            }
        }
        Collections.sort(averageMass);
        Collections.sort(dates);
        System.out.println("\"start_date\":"+dates.get(0).substring(0,11));
        System.out.println("\"end_date\":"+"\""+dates.get(dates.size()-1)+"\"");
        System.out.println("\"num_records\":"+averageMass.size());
        System.out.println("\"min_" +columnNames.get(num) +"\":"+ min);
        System.out.println("\"min_time_" +columnNames.get(num) +"\":"+ min_time);
        System.out.println("\"max_" +columnNames.get(num) +"\":"+ max);
        System.out.println("\"max_time_" +columnNames.get(num) +"\":"+ max_time);
        System.out.println("\"avg_" +columnNames.get(num) +"\":"+ average/averageMass.size());
    }

    public static boolean check(String row, JSONArray columnNames, int num) throws JSONException {
        String field = columnNames.get(num) + "_qc";
        int i;
        for(i=0;i<columnNames.length();i++){
            if (columnNames.get(i).equals(field))
                break;
        }
        String mass[] = row.split(",");
        return Float.valueOf(mass[i]) == 0;
    }

}