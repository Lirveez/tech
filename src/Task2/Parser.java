package Task2;
        import org.json.*;
        import java.io.*;
        import java.util.ArrayList;
        import java.util.Arrays;
        import java.util.Collections;
        import java.util.Comparator;
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
                getAverage(rows, columnNames, num);
                System.out.println("},");
            }
        }


    }

    public static void getAverage(JSONArray rows, JSONArray columnNames, int num) throws JSONException {
        float average = 0;
        ArrayList<Float> averageMass = new ArrayList<Float>();
        for (int i = 0; i < rows.length(); i++){
            String row = String.valueOf(rows.get(i));
            String mass[] = row.split(",");
            if(check(row,columnNames,num)) {
                averageMass.add(Float.valueOf(mass[num]));
                average = average + averageMass.get(averageMass.size()-1);
            }
        }
        Collections.sort(averageMass);
        System.out.println("\"min_" +columnNames.get(num) +"\":"+ averageMass.get(0));
        System.out.println("\"max_" +columnNames.get(num) +"\":"+ averageMass.get(averageMass.size()-1));
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